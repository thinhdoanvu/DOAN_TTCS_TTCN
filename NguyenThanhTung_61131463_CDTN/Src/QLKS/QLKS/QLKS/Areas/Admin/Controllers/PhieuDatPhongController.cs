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
using MVC.core2;

namespace QLKS.Areas.Admin.Controllers.Admin
{
    public class PhieuDatPhongController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();

        // GET: PhieuDatPhong
        public ActionResult Index()
        {
            AutoHuyPhieuDatPhong();
            var tblPhieuDatPhongs = db.tblPhieuDatPhongs.Include(t => t.tblKhachHang).Include(t => t.tblPhong).Include(t => t.tblTinhTrangPhieuDatPhong);
            return View(tblPhieuDatPhongs.ToList());
        }

        private void AutoHuyPhieuDatPhong()
        {
            var datenow = DateTime.Now;
            var tblPhieuDatPhongs = db.tblPhieuDatPhongs.Where(u=>u.ma_tinh_trang == 1).Include(t => t.tblKhachHang).Include(t => t.tblPhong).Include(t => t.tblTinhTrangPhieuDatPhong).ToList();
            //foreach(var item in tblPhieuDatPhongs)
            //{
            //    System.Diagnostics.Debug.WriteLine((item.ngay_vao - datenow).Value.Days);
            //    if ((item.ngay_vao - datenow).Value.Days < 0)
            //    {
            //        item.ma_tinh_trang = 3;
            //        db.Entry(item).State = EntityState.Modified;
            //        db.SaveChanges();
            //    }
            //}
            IIterator2 iterator2 = new PhieuDatPhongIteratorController(tblPhieuDatPhongs);
            var item = iterator2.First();
            while (!iterator2.IsDone)
            {
                System.Diagnostics.Debug.WriteLine((item.ngay_vao - datenow).Value.Days);
                if ((item.ngay_vao - datenow).Value.Days < 0)
                {
                    item.ma_tinh_trang = 3;
                    db.Entry(item).State = EntityState.Modified;
                    db.SaveChanges();
                }
                item = iterator2.Next();
            }
        }


        public ActionResult List()
        {
            AutoHuyPhieuDatPhong();
            var tblPhieuDatPhongs = db.tblPhieuDatPhongs.Where(t => t.ma_tinh_trang == 1 && t.ngay_vao.Value.Day == DateTime.Now.Day && t.ngay_vao.Value.Month == DateTime.Now.Month && t.ngay_vao.Value.Year == DateTime.Now.Year).Include(t => t.tblKhachHang).Include(t => t.tblPhong).Include(t => t.tblTinhTrangPhieuDatPhong);
            return View(tblPhieuDatPhongs.ToList());
        }

        // GET: PhieuDatPhong/Details/5
        public ActionResult Details(int? id)
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

        // GET: PhieuDatPhong/Create

        public ActionResult Create(int? id)
        {
            if (id != null)
            {
                ViewBag.select_ma_phong = id;
            }
            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "ma_kh");
            ViewBag.ma_phong = new SelectList(db.tblPhongs.Where(u => u.ma_tinh_trang == 1), "ma_phong", "so_phong");
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang");
            return View();
        }


        public ActionResult SelectRoom(String dateE)
        {
            if (dateE == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "ma_kh");
            DateTime ngay_ra = (DateTime.Parse(dateE)).AddHours(12);
            ViewBag.ngay_ra = ngay_ra;
            var s = db.tblPhongs.Where(t => !(db.tblPhieuDatPhongs.Where(m=>(m.ma_tinh_trang == 1 || m.ma_tinh_trang ==2) && (m.ngay_ra > DateTime.Now && m.ngay_ra < ngay_ra))).Select(m => m.ma_phong).ToList().Contains(t.ma_phong) && t.ma_tinh_trang == 1);
            ViewBag.ma_phong = new SelectList(s, "ma_phong", "so_phong");
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang");
            return View();
        }


        // POST: PhieuDatPhong/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(String radSelect, [Bind(Include = "ma_pdp,ma_kh,ngay_dat,ngay_vao,ngay_ra,ma_phong,ma_tinh_trang")] tblPhieuDatPhong tblPhieuDatPhong, [Bind(Include = "hoten,socmt,tuoi,sodt")] KhachHang kh)
        {
            System.Diagnostics.Debug.WriteLine("SS :"+radSelect);
            if (radSelect.Equals("rad2"))
            {
                tblPhieuDatPhong.ma_kh = null;
                List<KhachHang> likh = new List<KhachHang>();
                likh.Add(kh);
                String ttkh = JsonConvert.SerializeObject(likh);
                tblPhieuDatPhong.thong_tin_khach_thue = ttkh;
            }

                tblPhieuDatPhong.ma_tinh_trang = 1;
                tblPhieuDatPhong.ngay_vao = DateTime.Now;
                tblPhieuDatPhong.ngay_dat = DateTime.Now;
                db.tblPhieuDatPhongs.Add(tblPhieuDatPhong);
                db.SaveChanges();
                int ma = tblPhieuDatPhong.ma_pdp;
                return RedirectToAction("Add","HoaDon",new { id = ma });

            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "ma_kh", tblPhieuDatPhong.ma_kh);
            ViewBag.ma_phong = new SelectList(db.tblPhongs, "ma_phong", "so_phong", tblPhieuDatPhong.ma_phong);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang", tblPhieuDatPhong.ma_tinh_trang);
            return View(tblPhieuDatPhong);
        }

        // GET: PhieuDatPhong/Edit/5
        public ActionResult Edit(int? id)
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
        public ActionResult Edit([Bind(Include = "ma_pdp,ma_kh,ngay_dat,ngay_vao,ngay_ra,ma_phong,ma_tinh_trang")] tblPhieuDatPhong tblPhieuDatPhong)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblPhieuDatPhong).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.ma_kh = new SelectList(db.tblKhachHangs, "ma_kh", "mat_khau", tblPhieuDatPhong.ma_kh);
            ViewBag.ma_phong = new SelectList(db.tblPhongs, "ma_phong", "so_phong", tblPhieuDatPhong.ma_phong);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhieuDatPhongs, "ma_tinh_trang", "tinh_trang", tblPhieuDatPhong.ma_tinh_trang);
            return View(tblPhieuDatPhong);
        }

        // GET: PhieuDatPhong/Delete/5
        public ActionResult Delete(int? id)
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

        // POST: PhieuDatPhong/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            try
            {
                tblPhieuDatPhong tblPhieuDatPhong = db.tblPhieuDatPhongs.Find(id);
                db.tblPhieuDatPhongs.Remove(tblPhieuDatPhong);
                db.SaveChanges();
            }
            catch
            {

            }
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
    }
}
