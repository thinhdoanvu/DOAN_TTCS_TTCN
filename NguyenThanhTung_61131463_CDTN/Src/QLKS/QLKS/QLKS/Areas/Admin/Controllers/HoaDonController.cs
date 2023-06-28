using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Newtonsoft.Json;
using QLKS.Areas.Admin.Models;
using QLKS.Models;
using MVC.core;

namespace QLKS.Areas.Admin.Controllers.Admin
{
    public class HoaDonController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();

        // GET: HoaDon
        public ActionResult Index()
        {
            var tblHoaDons = db.tblHoaDons.Where(t=>t.ma_tinh_trang==2).Include(t => t.tblNhanVien).Include(t => t.tblPhieuDatPhong)
                .Include(t => t.tblTinhTrangHoaDon);
            double tong = 0;
            //foreach (var item in tblHoaDons.ToList())
            //{
            //    if (item.ma_tinh_trang == 2)
            //    {
            //        tong += (double)item.tong_tien;
            //    }
            //}
            IIterator iterator = new HoadonIteratorController(tblHoaDons.ToList());
            var item = iterator.First();
            while (!iterator.IsDone)
            {
                if (item.ma_tinh_trang == 2)
                {
                    tong += (double)item.tong_tien;
                }
                item = iterator.Next();
            }
            ViewBag.tong_tien = String.Format("{0:0,0.00}", tong);
            return View(tblHoaDons.ToList());
        }

        [HttpPost]
        public ActionResult Index(String beginDate, String endDate)
        {
            System.Diagnostics.Debug.WriteLine("your message here " + beginDate);
            List<tblHoaDon> dshd = new List<tblHoaDon>();
            String query = "select * from tblHoaDon where ma_tinh_trang=2 ";
            if (!beginDate.Equals(""))
                query += " and ngay_tra_phong >= '" + beginDate + "'";
            if (!endDate.Equals(""))
                query += " and ngay_tra_phong <= '" + endDate + "'";
            
            dshd = db.tblHoaDons.SqlQuery(query).ToList();
            double tong = 0;
            //foreach (var item in dshd)
            //{
            //    if (item.ma_tinh_trang == 2)
            //    {
            //        tong += (double)item.tong_tien;
            //    }
            //}
            IIterator iterator = new HoadonIteratorController(dshd);
            var item = iterator.First();
            while (!iterator.IsDone)
            {
                if (item.ma_tinh_trang == 2)
                {
                    tong += (double)item.tong_tien;
                }
                item = iterator.Next();
            }
            ViewBag.tong_tien = tong.ToString("C");
            return View(dshd);
        }

        // GET: HoaDon/Details/5
        public ActionResult Details(int? id)
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
            return View(tblHoaDon);
        }

        // GET: HoaDon/Create
        public ActionResult Create()
        {
            ViewBag.ma_nv = new SelectList(db.tblNhanViens, "ma_nv", "ho_ten");
            ViewBag.ma_pdp = new SelectList(db.tblPhieuDatPhongs, "ma_pdp", "ma_kh");
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangHoaDons, "ma_tinh_trang", "mo_ta");
            return View();
        }

        // POST: HoaDon/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "ma_hd,ma_pdp,ngay_tra_phong,ma_tinh_trang")] tblHoaDon tblHoaDon)
        {
            if (ModelState.IsValid)
            {
                db.tblHoaDons.Add(tblHoaDon);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.ma_nv = new SelectList(db.tblNhanViens, "ma_nv", "ho_ten", tblHoaDon.ma_nv);
            ViewBag.ma_pdp = new SelectList(db.tblPhieuDatPhongs, "ma_pdp", "ma_kh", tblHoaDon.ma_pdp);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangHoaDons, "ma_tinh_trang", "mo_ta", tblHoaDon.ma_tinh_trang);
            return View(tblHoaDon);
        }
        public ActionResult Add(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhieuDatPhong tblPhieuDatPhong = db.tblPhieuDatPhongs.Find(id);
            if (tblPhieuDatPhong == null)
            {
                return HttpNotFound();
            }
            return View(tblPhieuDatPhong);
        }
        // GET: HoaDon/Edit/5
        public ActionResult Edit(int? id)
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
            ViewBag.ma_nv = new SelectList(db.tblNhanViens, "ma_nv", "ho_ten", tblHoaDon.ma_nv);
            ViewBag.ma_pdp = new SelectList(db.tblPhieuDatPhongs, "ma_pdp", "ma_kh", tblHoaDon.ma_pdp);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangHoaDons, "ma_tinh_trang", "mo_ta", tblHoaDon.ma_tinh_trang);
            return View(tblHoaDon);
        }

        // POST: HoaDon/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "ma_hd,ma_nv,ma_pdp,ngay_tra_phong,ma_tinh_trang,tien_phong,tien_dich_vu,phu_thu,tong_tien")] tblHoaDon tblHoaDon)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblHoaDon).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.ma_nv = new SelectList(db.tblNhanViens, "ma_nv", "ho_ten", tblHoaDon.ma_nv);
            ViewBag.ma_pdp = new SelectList(db.tblPhieuDatPhongs, "ma_pdp", "ma_kh", tblHoaDon.ma_pdp);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangHoaDons, "ma_tinh_trang", "mo_ta", tblHoaDon.ma_tinh_trang);
            return View(tblHoaDon);
        }

        // GET: HoaDon/Delete/5
        public ActionResult Delete(int? id)
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
            return View(tblHoaDon);
        }

        // POST: HoaDon/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            tblHoaDon tblHoaDon = db.tblHoaDons.Find(id);
            db.tblHoaDons.Remove(tblHoaDon);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
        public ActionResult Result(String ma_pdp,String hoten1,String hoten2,String hoten3,String hoten4,String tuoi1,String tuoi2,String tuoi3,String tuoi4)
        {
            if (ma_pdp == null)
            {
                return RedirectToAction("Index", "Index");
            }
            else
            {
                
                    List<KhachHang> likh;
                    tblPhieuDatPhong pt = db.tblPhieuDatPhongs.Find(Int32.Parse(ma_pdp));
                    if (pt.thong_tin_khach_thue == null)
                    {
                        likh = new List<KhachHang>();
                        likh.Add(new KhachHang("", ""));
                    }
                    else
                    {
                        likh = JsonConvert.DeserializeObject<List<KhachHang>>(pt.thong_tin_khach_thue);
                    }
                    if (!hoten1.Equals(""))
                        likh.Add(new KhachHang(hoten1, tuoi1));
                    if (!hoten2.Equals(""))
                     likh.Add(new KhachHang(hoten2, tuoi2));
                    if (!hoten3.Equals(""))
                        likh.Add(new KhachHang(hoten3, tuoi3));
                    if (!hoten4.Equals(""))
                        likh.Add(new KhachHang(hoten4, tuoi4));
                    pt.thong_tin_khach_thue = JsonConvert.SerializeObject(likh);
                    db.Entry(pt).State = EntityState.Modified;
                    db.SaveChanges();
                
                tblHoaDon hd = new tblHoaDon();
                hd.ma_pdp = Int32.Parse(ma_pdp);
                hd.ma_tinh_trang = 1;
                try
                {
                    db.tblHoaDons.Add(hd);
                    tblPhieuDatPhong tgd = db.tblPhieuDatPhongs.Find(Int32.Parse(ma_pdp));
                    if (tgd == null)
                    {
                        return HttpNotFound();
                    }
                    tblPhong p = db.tblPhongs.Find(tgd.ma_phong);
                    if (p == null)
                    {
                        return HttpNotFound();
                    }
                    tgd.ma_tinh_trang = 2;
                    db.Entry(tgd).State = EntityState.Modified;
                    p.ma_tinh_trang = 2;
                    db.Entry(p).State = EntityState.Modified;
                    ViewBag.ngay_ra = tgd.ngay_ra;
                    db.SaveChanges();
                    ViewBag.Result = "success";
                }
                catch
                {
                    ViewBag.Result = "error";
                }
            }
            return View();
        }
        public ActionResult ThanhToan(int? id)
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
            DateTime ngay_ra = DateTime.Now;
            DateTime ngay_vao = (DateTime)tblHoaDon.tblPhieuDatPhong.ngay_vao;
            DateTime ngay_du_kien = (DateTime)tblHoaDon.tblPhieuDatPhong.ngay_ra;

            DateTime dateS = new DateTime(ngay_vao.Year, ngay_vao.Month, ngay_vao.Day, 12, 0, 0);
            DateTime dateE = new DateTime(ngay_ra.Year, ngay_ra.Month, ngay_ra.Day, 12, 0, 0);

            Double gia =(Double) tblHoaDon.tblPhieuDatPhong.tblPhong.tblLoaiPhong.gia;

            var songay = (dateE - dateS).TotalDays;
            if (songay == 0)
                songay++;
            if (dateS > ngay_vao)
                songay++;
            if (ngay_ra > dateE)
                songay++;
            var ti_le_phu_thu = tblHoaDon.tblPhieuDatPhong.tblPhong.tblLoaiPhong.ti_le_phu_thu;
            var so_ngay_phu_thu =songay;

            System.Diagnostics.Debug.WriteLine("So ngay: "+so_ngay_phu_thu);
            System.Diagnostics.Debug.WriteLine("Gia: " + gia);
            System.Diagnostics.Debug.WriteLine("Ti le: :" + ti_le_phu_thu);

            var phuthu = so_ngay_phu_thu * gia * ti_le_phu_thu / 100;
            ViewBag.phu_thu = phuthu;

            System.Diagnostics.Debug.WriteLine("Phu thu:" + phuthu);

            ViewBag.so_ngay_phu_thu = so_ngay_phu_thu;
            var tien_phong = songay * gia;
            ViewBag.tien_phong = tien_phong;
            ViewBag.so_ngay = songay;

            tblNhanVien nv = (tblNhanVien)Session["NV"];
            if(nv!= null)
            {
                ViewBag.ho_ten = nv.ho_ten;
            }
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
            ViewBag.tong_tien = tien_phong + tongtiendv + phuthu;
            return View(tblHoaDon);
        }
        public ActionResult GoiDichVu(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            GoiDichVuModel mod = new GoiDichVuModel();
            mod.dsDichVu = db.tblDichVus.Where(t=>t.ton_kho > 0).ToList();
            mod.dsDvDaDat = db.tblDichVuDaDats.Where(u => u.ma_hd == id).ToList();
            ViewBag.ma_hd = id;
            ViewBag.so_phong = db.tblHoaDons.Find(id).tblPhieuDatPhong.tblPhong.so_phong;
            return View(mod);
        }
        public ActionResult XacNhanGoiDichVu(String ma_hd, String ma_dv, String so_luong)
        {
            if (ma_hd == null || ma_dv == null || so_luong == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            int mahd = Int32.Parse(ma_hd);
            int madv = Int32.Parse(ma_dv);
            int sol = Int32.Parse(so_luong);
            var ds = db.tblDichVuDaDats.Where(t => t.ma_hd == mahd).ToList();
            
            try
            {
                bool check = false;
                foreach(var item in ds)
                {
                    if(item.ma_dv == madv)
                    {
                        item.so_luong += sol;
                        check = true;
                        break;
                    }
                }
                if (!check)
                {
                    tblDichVuDaDat dv = new tblDichVuDaDat();
                    dv.ma_hd = Int32.Parse(ma_hd);
                    dv.ma_dv = Int32.Parse(ma_dv);
                    dv.so_luong = Int32.Parse(so_luong);
                    db.tblDichVuDaDats.Add(dv);
                }
                tblDichVu dichvu = db.tblDichVus.Find(madv);
                dichvu.ton_kho -= sol;
                db.SaveChanges();
            }
            catch
            {

            }
            return RedirectToAction("GoiDichVu", "HoaDon", new { id = ma_hd });
        }
        public ActionResult SuaDichVu(String ma_hd, String edit_id, String edit_so_luong)
        {
            if (ma_hd == null || edit_id == null || edit_so_luong == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblDichVuDaDat dsdv = db.tblDichVuDaDats.Find(Int32.Parse(edit_id));
            int sol = Int32.Parse(edit_so_luong);
            tblDichVu dv = db.tblDichVus.Find(dsdv.ma_dv);
            int del = (int)(sol - dsdv.so_luong);
            if (del > dv.ton_kho)
            {
                return RedirectToAction("GoiDichVu", "HoaDon", new { id = ma_hd });
            }
            else
            {
                dsdv.so_luong = sol;
                dv.ton_kho -= del;
                db.Entry(dsdv).State = EntityState.Modified;
                db.Entry(dv).State = EntityState.Modified;
                db.SaveChanges();
            }
            
            return RedirectToAction("GoiDichVu", "HoaDon", new { id = ma_hd });
        }
        public ActionResult XoaDichVu(String ma_hd, String del_id)
        {
            tblDichVuDaDat d = db.tblDichVuDaDats.Find(Int32.Parse(del_id));
            db.tblDichVuDaDats.Remove(d);
            db.SaveChanges();
            return RedirectToAction("GoiDichVu", "HoaDon", new { id = ma_hd });
        }


        /// <summary>
        /// ///////////////////

        /// <returns></returns>
        /// 

        public ActionResult XacNhanThanhToan(String ma_hd, String tien_phong, String tien_dich_vu,String phu_thu, String tong_tien)
        {
            if (ma_hd == null || tien_phong == null || tien_dich_vu == null || phu_thu == null || tong_tien == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            try
            {
                tblHoaDon hd = db.tblHoaDons.Find(Int32.Parse(ma_hd));
                tblNhanVien nv = (tblNhanVien)Session["NV"];
                if(nv!=null)
                    hd.ma_nv = nv.ma_nv;
                hd.tien_phong = Double.Parse(tien_phong);
                hd.tien_dich_vu = Double.Parse(tien_dich_vu);
                hd.phu_thu = Double.Parse(phu_thu);
                hd.tong_tien = Double.Parse(tong_tien);
                hd.ma_tinh_trang = 2;
                hd.ngay_tra_phong = DateTime.Now;
                db.Entry(hd).State = EntityState.Modified;

                tblPhong p = db.tblPhongs.Find(hd.tblPhieuDatPhong.ma_phong);
                p.ma_tinh_trang = 3;
                tblPhieuDatPhong pd = db.tblPhieuDatPhongs.Find(hd.tblPhieuDatPhong.ma_pdp);
                pd.ma_tinh_trang = 4;
                db.Entry(p).State = EntityState.Modified;
                db.Entry(pd).State = EntityState.Modified;
                db.SaveChanges();

                ViewBag.result = "success";
            }
            catch
            {
                ViewBag.result = "error";
            }
            ViewBag.ma_hd = ma_hd;
            return View();
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
        public ActionResult GiaHanPhong(int? id)
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
            tblPhieuDatPhong pdp = db.tblPhieuDatPhongs.Find(tblHoaDon.ma_pdp);
            String dt = null;
            try
            {
                DateTime d = (DateTime)db.tblPhieuDatPhongs.Where(t => t.ma_tinh_trang == 1 && t.ma_phong == pdp.tblPhong.ma_phong).Select(t => t.ngay_vao).OrderBy(t => t.Value).First();
                dt = d.ToString();
            }
            catch
            {

            }
            ViewBag.dateMax = dt;
            return View(pdp);
        }
        public ActionResult ResultGiaHan(String ma_pdp,String ngay_ra)
        {
            if(ma_pdp==null || ngay_ra == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            try
            {
                tblPhieuDatPhong pdp = db.tblPhieuDatPhongs.Find(Int32.Parse(ma_pdp));
                DateTime ngayra = DateTime.Parse(ngay_ra);
                pdp.ngay_ra = ngayra;
                ViewBag.result = "success";
                ViewBag.ngay_ra = ngay_ra;
            }
            catch(Exception e)
            {
                ViewBag.result = "error: "+e;
            }
            return View();
        }


        public ActionResult DoiPhong(int? id)
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
            tblPhieuDatPhong pdp = db.tblPhieuDatPhongs.Find(tblHoaDon.ma_pdp);

            var li = db.tblPhongs.Where(t => t.ma_tinh_trang==1 && !(db.tblPhieuDatPhongs.Where(m => (m.ma_tinh_trang == 1 || m.ma_tinh_trang ==2) && m.ngay_ra > DateTime.Now && m.ngay_vao < pdp.ngay_ra)).Select(m => m.ma_phong).ToList().Contains(t.ma_phong));
            ViewBag.ma_phong_moi = new SelectList(li, "ma_phong", "so_phong");
            return View(pdp);
        }

        public ActionResult ResultDoiPhong(String ma_pdp,String ma_phong_cu, String ma_phong_moi)
        {
            if (ma_pdp == null || ma_phong_cu == null || ma_phong_moi == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            try
            {
                tblPhieuDatPhong pdp = db.tblPhieuDatPhongs.Find(Int32.Parse(ma_pdp));
                tblPhong p = db.tblPhongs.Find(pdp.tblPhong.ma_phong);      // lấy thông tin phòng cũ
                p.ma_tinh_trang = 3;                                        // set phòng cũ về đang dọn
                db.Entry(p).State = EntityState.Modified;
                pdp.ma_phong = Int32.Parse(ma_phong_moi);                   // đổi phòng cũ sang mới
                p = db.tblPhongs.Find(Int32.Parse(ma_phong_moi));           // lấy thông tin phòng mới
                p.ma_tinh_trang = 2;                                        // set phòng mới về đang sd
                db.Entry(p).State = EntityState.Modified;
                db.Entry(pdp).State = EntityState.Modified;
                db.SaveChanges();
                ViewBag.result = "success";
            }
            catch (Exception e)
            {
                ViewBag.result = "error: " + e;
            }
            return View();
        }
    }
}
