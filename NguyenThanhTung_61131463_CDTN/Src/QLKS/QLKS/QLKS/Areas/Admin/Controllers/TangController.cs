using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;

namespace QLKS.Areas.Admin.Controllers.Admin
{
    public class TangController : Controller
    {
        private dataQLKSEntities db = new dataQLKSEntities();

        // GET: Tang
        public ActionResult Index()
        {
            return View(db.tblTangs.ToList());
        }

        // GET: Tang/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblTang tblTang = db.tblTangs.Find(id);
            if (tblTang == null)
            {
                return HttpNotFound();
            }
            return View(tblTang);
        }

        // GET: Tang/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Tang/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "ma_tang,ten_tang")] tblTang tblTang)
        {
            if (ModelState.IsValid)
            {
                db.tblTangs.Add(tblTang);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(tblTang);
        }

        // GET: Tang/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblTang tblTang = db.tblTangs.Find(id);
            if (tblTang == null)
            {
                return HttpNotFound();
            }
            return View(tblTang);
        }

        // POST: Tang/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "ma_tang,ten_tang")] tblTang tblTang)
        {
            if (ModelState.IsValid)
            {
                db.Entry(tblTang).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(tblTang);
        }

        // GET: Tang/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            tblTang tblTang = db.tblTangs.Find(id);
            if (tblTang == null)
            {
                return HttpNotFound();
            }
            return View(tblTang);
        }

        // POST: Tang/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            try
            {
                tblTang tblTang = db.tblTangs.Find(id);
                db.tblTangs.Remove(tblTang);
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
