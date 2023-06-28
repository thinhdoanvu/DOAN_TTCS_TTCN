using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;

namespace QLKS.Areas.Admin.Controllers
{
    public class IndexController : Controller
    {
        // GET: Admin
        dataQLKSEntities db = new dataQLKSEntities();
        public ActionResult Index()
        {
            int so_phong_trong = 0, so_phong_sd = 0, so_phong_don = 0;
            var listPhongs = db.tblPhongs.Where(t=>t.ma_tinh_trang<5).ToList();
            foreach(var item in listPhongs)
            {
                if (item.ma_tinh_trang == 1)
                    so_phong_trong++;
                else if (item.ma_tinh_trang == 2)
                    so_phong_sd++;
                else
                    so_phong_don++;
            }
            ViewBag.so_phong_trong = so_phong_trong;
            ViewBag.so_phong_sd = so_phong_sd;
            ViewBag.so_phong_don = so_phong_don;
            return View(listPhongs);
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Login(tblNhanVien objUser)
        {
            if (ModelState.IsValid)
            {
                var obj = db.tblNhanViens.Where(a => a.tai_khoan.Equals(objUser.tai_khoan) && a.mat_khau.Equals(objUser.mat_khau)).FirstOrDefault();
                if (obj != null)
                {
                    Session["NV"] = obj;
                    return RedirectToAction("Index", "ThongKe");
                }
                else
                {
                    ModelState.AddModelError("", "Login data is incorrect!");
                }
            }
            return View(objUser);
        }
        [HttpGet]
        public ActionResult Login()
        {
            if (Session["NV"] != null)
                return RedirectToAction("Index", "ThongKe");
            return View();
        }
        public ActionResult Logout()
        {
            Session["NV"] = null;
            return RedirectToAction("Login","Index");
        }


        public ActionResult ChonCachDatPhong()
        {
            return View();
        }
        public ActionResult ListPhongDangHoatDong()
        {
            var list = db.tblHoaDons.Where(u=>u.ma_tinh_trang == 1).Include(t => t.tblNhanVien).Include(t => t.tblPhieuDatPhong).Include(t => t.tblTinhTrangHoaDon);
            return View(list.ToList());
        }
        public ActionResult DSPhongGoiDV()
        {
            var list = db.tblHoaDons.Where(u => u.ma_tinh_trang == 1).Include(t => t.tblNhanVien).Include(t => t.tblPhieuDatPhong).Include(t => t.tblTinhTrangHoaDon);
            return View(list.ToList());
        }
        public ActionResult TraPhong(String id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            return View();
        }
        public ActionResult FindHdById(int? id)
        {
            if(id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            int ma_hd = db.tblHoaDons.Where(u => u.tblPhieuDatPhong.ma_phong == id && u.ma_tinh_trang == 1).First().ma_hd;
            return RedirectToAction("ThanhToan", "HoaDon", new { id = ma_hd });
        }
        public ActionResult FindHdById2(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            int ma_hd = db.tblHoaDons.Where(u => u.tblPhieuDatPhong.ma_phong == id && u.ma_tinh_trang == 1).First().ma_hd;
            return RedirectToAction("GoiDichVu", "HoaDon", new { id = ma_hd });
        }
        public ActionResult DonPhongXong(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhong p = db.tblPhongs.Where(u => u.ma_phong == id).First();
            p.ma_tinh_trang = 1;
            db.Entry(p).State = EntityState.Modified;
            db.SaveChanges();
            return RedirectToAction("Index", "Index");
        }
        public ActionResult FindRoom()
        {
            return View();
        }

        public ActionResult CaNhan()
        {
            tblNhanVien nv = (tblNhanVien)Session["NV"];
            if (nv != null)
            {
                nv = db.tblNhanViens.Find(nv.ma_nv);
                ViewBag.ma_chuc_vu = new SelectList(db.tblChucVus, "ma_chuc_vu", "chuc_vu", nv.ma_chuc_vu);
                return View(nv);
            }
            else
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult CaNhan([Bind(Include = "ma_nv,ho_ten,ngay_sinh,dia_chi,sdt,tai_khoan,mat_khau,ma_chuc_vu")] tblNhanVien tblNhanVien)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblNhanVien).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.ma_chuc_vu = new SelectList(db.tblChucVus, "ma_chuc_vu", "chuc_vu", tblNhanVien.ma_chuc_vu);
            return View(tblNhanVien);
        }


        [HttpPost]
        public ActionResult UploadFiles()
        {
            // Checking no of files injected in Request object  
            if (Request.Files.Count > 0)
            {
                try
                {
                    //  Get all files from Request object  
                    HttpFileCollectionBase files = Request.Files;
                    string code = "";
                    List<String> dsImg = new List<string>();
                    for (int i = 0; i < files.Count; i++)
                    {
                        //string path = AppDomain.CurrentDomain.BaseDirectory + "Uploads/";  
                        //string filename = Path.GetFileName(Request.Files[i].FileName);  

                        HttpPostedFileBase file = files[i];
                        string fname;

                        // Checking for Internet Explorer  
                        if (Request.Browser.Browser.ToUpper() == "IE" || Request.Browser.Browser.ToUpper() == "INTERNETEXPLORER")
                        {
                            string[] testfiles = file.FileName.Split(new char[] { '\\' });
                            fname = testfiles[testfiles.Length - 1];
                        }
                        else
                        {
                            fname = file.FileName;
                        }

                        // Get the complete folder path and store the file inside it.  
                        String filename = Path.Combine(Server.MapPath("~/Content/Images/Phong/"), fname);
                        file.SaveAs(filename);
                        dsImg.Add("/Content/Images/Phong/" + fname);
                    }
                    // Returns message that successfully uploaded
                    code = Newtonsoft.Json.JsonConvert.SerializeObject(dsImg);
                    return Json(code);
                }
                catch
                {
                    return null;
                }
            }
            return null;
        }
    }
}