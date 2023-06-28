using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;
//using MVC.core3;


namespace QLKS.Areas.Admin.Controllers.Admin
{
    public class PhongController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();
        //public PhongController(dataQLKSEntities _db)
        //{
        //    db = _db;
        //    PhongSingletonController.Instance.Init(_db);
        //}

        // GET: Phong
        public ActionResult Index()
        {
            //var tblPhongs = PhongSingletonController.Instance.listTblPhong;
            var tblPhongs = db.tblPhongs.Where(t=>t.ma_tinh_trang<5).Include(t => t.tblLoaiPhong).Include(t => t.tblTang).Include(t => t.tblTinhTrangPhong);
            return View(tblPhongs.ToList());
        }

        // GET: Phong/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhong tblPhong = db.tblPhongs.Find(id);
            if (tblPhong == null)
            {
                return HttpNotFound();
            }
            return View(tblPhong);
        }

        // GET: Phong/Create
        public ActionResult Create()
        {
            ViewBag.loai_phong = new SelectList(db.tblLoaiPhongs, "loai_phong", "mo_ta");
            ViewBag.ma_tang = new SelectList(db.tblTangs, "ma_tang", "ten_tang");
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhongs, "ma_tinh_trang", "mo_ta");
            return View();
        }

        // POST: Phong/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "ma_phong,so_phong,loai_phong,ma_tang,ma_tinh_trang")] tblPhong tblPhong)
        {
            if (ModelState.IsValid)
            {
                db.tblPhongs.Add(tblPhong);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.loai_phong = new SelectList(db.tblLoaiPhongs, "loai_phong", "mo_ta", tblPhong.loai_phong);
            ViewBag.ma_tang = new SelectList(db.tblTangs, "ma_tang", "ten_tang", tblPhong.ma_tang);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhongs, "ma_tinh_trang", "mo_ta", tblPhong.ma_tinh_trang);
            return View(tblPhong);
        }

        // GET: Phong/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhong tblPhong = db.tblPhongs.Find(id);
            if (tblPhong == null)
            {
                return HttpNotFound();
            }
            ViewBag.loai_phong = new SelectList(db.tblLoaiPhongs, "loai_phong", "mo_ta", tblPhong.loai_phong);
            ViewBag.ma_tang = new SelectList(db.tblTangs, "ma_tang", "ten_tang", tblPhong.ma_tang);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhongs, "ma_tinh_trang", "mo_ta", tblPhong.ma_tinh_trang);
            return View(tblPhong);
        }

        // POST: Phong/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "ma_phong,so_phong,loai_phong,ma_tang,ma_tinh_trang")] tblPhong tblPhong)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblPhong).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.loai_phong = new SelectList(db.tblLoaiPhongs, "loai_phong", "mo_ta", tblPhong.loai_phong);
            ViewBag.ma_tang = new SelectList(db.tblTangs, "ma_tang", "ten_tang", tblPhong.ma_tang);
            ViewBag.ma_tinh_trang = new SelectList(db.tblTinhTrangPhongs, "ma_tinh_trang", "mo_ta", tblPhong.ma_tinh_trang);
            return View(tblPhong);
        }

        // GET: Phong/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblPhong tblPhong = db.tblPhongs.Find(id);
            if (tblPhong == null)
            {
                return HttpNotFound();
            }
            return View(tblPhong);
        }

        // POST: Phong/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            try
            {
                tblPhong tblPhong = db.tblPhongs.Find(id);
                tblPhong.ma_tinh_trang = 5;
                db.Entry(tblPhong).State = EntityState.Modified;
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
