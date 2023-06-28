using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;

namespace QLKS.Areas.Admin.Controllers
{
    public class KhachHangController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();
        // GET: KhachHang
        public ActionResult Index()
        {
            return View(db.tblKhachHangs.ToList());
        }

        // GET: KhachHang/Details/5
        public ActionResult Details(string id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblKhachHang tblKhachHang = db.tblKhachHangs.Find(id);
            if (tblKhachHang == null)
            {
                return HttpNotFound();
            }
            return View(tblKhachHang);
        }

        // GET: KhachHang/Create
        public ActionResult Register()
        {
            return View();
        }

        // POST: KhachHang/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Register([Bind(Include = "ma_kh,mat_khau,ho_ten,cmt,sdt,mail")] tblKhachHang tblKhachHang)
        {
            if (ModelState.IsValid)
            {
                db.tblKhachHangs.Add(tblKhachHang);
                db.SaveChanges();
                Session["KH"] = tblKhachHang;
                return RedirectToAction("BookRoom","Home");
            }

            return View(tblKhachHang);
        }

        public ActionResult Add()
        {
            return View();
        }

        // POST: KhachHang/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Add([Bind(Include = "ma_kh,mat_khau,ho_ten,cmt,sdt,mail")] tblKhachHang tblKhachHang)
        {
            if (ModelState.IsValid)
            {
                if (db.tblKhachHangs.Find(tblKhachHang.ma_kh)==null)
                {
                    db.tblKhachHangs.Add(tblKhachHang);
                    db.SaveChanges();
                    return RedirectToAction("FindRoom", "Admin");
                }
                else
                {
                    ModelState.AddModelError("", "Login data is incorrect!");
                }
            }

            return View(tblKhachHang);
        }

        // GET: KhachHang/Edit/5
        public ActionResult Edit(string id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblKhachHang tblKhachHang = db.tblKhachHangs.Find(id);
            if (tblKhachHang == null)
            {
                return HttpNotFound();
            }
            return View(tblKhachHang);
        }

        // POST: KhachHang/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "ma_kh,mat_khau,ho_ten,cmt,sdt,mail,diem")] tblKhachHang tblKhachHang)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblKhachHang).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(tblKhachHang);
        }


        public ActionResult CaNhan()
        {
            tblKhachHang kh = new tblKhachHang();
            if (Session["KH"] == null)
            {
                return RedirectToAction("Index", "Home");
            }
            else
            {
                kh = (tblKhachHang)Session["KH"];
            }
            return View(kh);
        }

        // POST: KhachHang/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult CaNhan([Bind(Include = "ma_kh,mat_khau,ho_ten,cmt,sdt,mail,diem")] tblKhachHang tblKhachHang)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblKhachHang).State = EntityState.Modified;
                db.SaveChanges();
                Session["KH"] = tblKhachHang;
                return RedirectToAction("Index","Home");
            }
            return View(tblKhachHang);
        }

        // GET: KhachHang/Delete/5
        public ActionResult Delete(string id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblKhachHang tblKhachHang = db.tblKhachHangs.Find(id);
            if (tblKhachHang == null)
            {
                return HttpNotFound();
            }
            return View(tblKhachHang);
        }

        // POST: KhachHang/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(string id)
        {
            try
            {
                tblKhachHang tblKhachHang = db.tblKhachHangs.Find(id);
                db.tblKhachHangs.Remove(tblKhachHang);
                db.SaveChanges();
            }
            catch
            {

            }
            return RedirectToAction("Index");
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Login(tblKhachHang objUser)
        {
            if (ModelState.IsValid)
            {
                var obj = db.tblKhachHangs.Where(a => a.ma_kh.Equals(objUser.ma_kh) && a.mat_khau.Equals(objUser.mat_khau)).FirstOrDefault();
                if (obj != null)
                {
                    Session["KH"] = obj;
                    return RedirectToAction("BookRoom", "Home");
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
            Session["KH"] = null;
            tblKhachHang kh = (tblKhachHang) Session["KH"];
            if (kh != null)
                return RedirectToAction("BookRoom", "Home");
            return View();
        }




        public ActionResult SuaPhieuDatPhong(int? id)
        {
            tblKhachHang kh = new tblKhachHang();
            if (Session["KH"] != null)
                kh = (tblKhachHang)Session["KH"];
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhieuDatPhong tblPhieuDatPhong = db.tblPhieuDatPhongs.Find(id);
            if (tblPhieuDatPhong == null)
            {
                return HttpNotFound();
            }
            if (tblPhieuDatPhong.ma_kh != kh.ma_kh)
                return RedirectToAction("Index", "Home");
            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "mat_khau", tblPhieuDatPhong.ma_kh);
            ViewBag.ma_phong = new SelectList(db.tblPhongs, "ma_phong", "so_phong", tblPhieuDatPhong.ma_phong);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang", tblPhieuDatPhong.ma_tinh_trang);
            return View(tblPhieuDatPhong);
        }

        // POST: PhieuDatPhong/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult SuaPhieuDatPhong([Bind(Include = "ma_pdp,ma_kh,ngay_dat,ngay_vao,ngay_ra,ma_phong,ma_tinh_trang")] tblPhieuDatPhong tblPhieuDatPhong)
        {
            if (ModelState.IsValid)
            {
                tblPhieuDatPhong.ma_tinh_trang = 1;
                db.Entry(tblPhieuDatPhong).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("BookRoom", "Home");
            }
            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "mat_khau", tblPhieuDatPhong.ma_kh);
            ViewBag.ma_phong = new SelectList(db.tblPhongs, "ma_phong", "so_phong", tblPhieuDatPhong.ma_phong);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang", tblPhieuDatPhong.ma_tinh_trang);
            return RedirectToAction("BookRoom", "Home");
        }

        // GET: PhieuDatPhong/Delete/5
        public ActionResult XoaPhieuDatPhong(int? id)
        {
            tblKhachHang kh = new tblKhachHang();
            if (Session["KH"] != null)
                kh = (tblKhachHang)Session["KH"];
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }

            tblPhieuDatPhong tblPhieuDatPhong = db.tblPhieuDatPhongs.Find(id);
            if (tblPhieuDatPhong == null)
            {
                return HttpNotFound();
            }
            if (tblPhieuDatPhong.ma_kh != kh.ma_kh)
                return RedirectToAction("Index", "Home");
            return View(tblPhieuDatPhong);
        }

        // POST: PhieuDatPhong/Delete/5
        [HttpPost, ActionName("XoaPhieuDatPhong")]
        [ValidateAntiForgeryToken]
        public ActionResult ConfirmXoaPhieuDatPhong(int id)
        {
            tblPhieuDatPhong tblPhieuDatPhong = db.tblPhieuDatPhongs.Find(id);
            tblPhieuDatPhong.ma_tinh_trang = 3;
            db.Entry(tblPhieuDatPhong).State = EntityState.Modified;
            db.SaveChanges();
            return RedirectToAction("BookRoom","Home");
        }

        public ActionResult Logout()
        {
            Session["KH"] = null;
            return RedirectToAction("Login", "KhachHang");
        }






        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        public ActionResult HoaDon()
        {
            tblKhachHang kh = new tblKhachHang();
            if (Session["KH"] != null)
                kh = (tblKhachHang)Session["KH"];
            else
                return RedirectToAction("Index", "Home");

            var dsHoaDon = db.tblHoaDons.Where(t => t.tblPhieuDatPhong.ma_kh == kh.ma_kh).ToList();
            return View(dsHoaDon);
        }
        public ActionResult ChiTietHoaDon(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblHoaDon tblHoaDon = db.tblHoaDons.Find(id);
            if (tblHoaDon == null)
            {
                return HttpNotFound();
            }

            var tien_phong = (tblHoaDon.tblPhieuDatPhong.ngay_ra - tblHoaDon.tblPhieuDatPhong.ngay_vao).Value.TotalDays * tblHoaDon.tblPhieuDatPhong.tblPhong.tblLoaiPhong.gia;
            ViewBag.tien_phong = tien_phong;

            ViewBag.time_now = DateTime.Now.ToString();

            List<tblDichVuDaDat> dsdv = db.tblDichVuDaDats.Where(u => u.ma_hd == id).ToList();
            ViewBag.list_dv = dsdv;
            double tongtiendv = 0;
            List<double> tt = new List<double>();
            foreach (var item in dsdv)
            {
                double t = (double)(item.so_luong * item.tblDichVu.gia);
                tongtiendv += t;
                tt.Add(t);
            }
            ViewBag.list_tt = tt;
            ViewBag.tien_dich_vu = tongtiendv;
            ViewBag.tong_tien = tien_phong + tongtiendv;
            return View(tblHoaDon);
        }
    }
}
