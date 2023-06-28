using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.IO;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;

namespace QLKS.Areas.Admin.Controllers
{
    public class DichVuController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();

        // GET: DichVu
        public ActionResult Index()
        {
            return View(db.tblDichVus.ToList());
        }

        // GET: DichVu/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblDichVu tblDichVu = db.tblDichVus.Find(id);
            if (tblDichVu == null)
            {
                return HttpNotFound();
            }
            return View(tblDichVu);
        }

        // GET: DichVu/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: DichVu/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(HttpPostedFileBase file, [Bind(Include = "ma_dv,ten_dv,gia,don_vi,ton_kho")] tblDichVu tblDichVu)
        {
            if (ModelState.IsValid)
            {
                String anh = "/Content/Images/DichVu/default.png";
                if (file != null)
                {
                    string pic = System.IO.Path.GetFileName(file.FileName);
                    String path = System.IO.Path.Combine(
                                           Server.MapPath("~/Content/Images/DichVu"), pic);
                    // file is uploaded
                    file.SaveAs(path);
                    anh = "/Content/Images/DichVu/" + pic;
                    // save the image path path to the database or you can send image 
                    // directly to database
                    // in-case if you want to store byte[] ie. for DB
                    using (MemoryStream ms = new MemoryStream())
                    {
                        file.InputStream.CopyTo(ms);
                        byte[] array = ms.GetBuffer();
                    }
                }

                tblDichVu.anh = anh;
                db.tblDichVus.Add(tblDichVu);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(tblDichVu);
        }

        // GET: DichVu/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblDichVu tblDichVu = db.tblDichVus.Find(id);
            if (tblDichVu == null)
            {
                return HttpNotFound();
            }
            return View(tblDichVu);
        }

        // POST: DichVu/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(HttpPostedFileBase file, [Bind(Include = "ma_dv,ten_dv,gia,don_vi,ton_kho")] tblDichVu tblDichVu)
        {
            tblDichVu dv = db.tblDichVus.Find(tblDichVu.ma_dv);
            if (ModelState.IsValid)
            {
                String anh = dv.anh;
                if (file != null)
                {
                    string pic = System.IO.Path.GetFileName(file.FileName);
                    String path = System.IO.Path.Combine(
                                           Server.MapPath("~/Content/Images/DichVu"), pic);
                    // file is uploaded
                    file.SaveAs(path);
                    anh = "/Content/Images/DichVu/" + pic;
                    // save the image path path to the database or you can send image 
                    // directly to database
                    // in-case if you want to store byte[] ie. for DB
                    using (MemoryStream ms = new MemoryStream())
                    {
                        file.InputStream.CopyTo(ms);
                        byte[] array = ms.GetBuffer();
                    }
                }

                dv.anh = anh;
                dv.don_vi = tblDichVu.don_vi;
                dv.gia = tblDichVu.gia;
                dv.ten_dv = tblDichVu.ten_dv;
                db.Entry(dv).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(tblDichVu);
        }

        // GET: DichVu/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblDichVu tblDichVu = db.tblDichVus.Find(id);
            if (tblDichVu == null)
            {
                return HttpNotFound();
            }
            return View(tblDichVu);
        }

        // POST: DichVu/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            try
            {
                tblDichVu tblDichVu = db.tblDichVus.Find(id);
                db.tblDichVus.Remove(tblDichVu);
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
