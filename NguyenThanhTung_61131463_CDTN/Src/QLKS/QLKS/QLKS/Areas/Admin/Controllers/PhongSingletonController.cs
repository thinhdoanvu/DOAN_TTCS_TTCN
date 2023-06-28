using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using QLKS.Models;

namespace MVC.core3
{
    public class PhongSingletonController 
    {       
        public static PhongSingletonController Instance { get; } = new PhongSingletonController();
        public List<tblPhong> listTblPhong { get; } = new List<tblPhong>();
        private PhongSingletonController() { }
        public void Init(dataQLKSEntities db)
        {
            if(listTblPhong.Count == 0)
            {
                var tblPhongs = db.tblPhongs
                    .Where(t => t.ma_tinh_trang < 5)
                    .Include(t => t.tblLoaiPhong)
                    .Include(t => t.tblTang)
                    .Include(t => t.tblTinhTrangPhong)
                    .ToList();
                foreach(var item in tblPhongs)
                {
                    listTblPhong.Add(item);
                }
            }
        }
    }
}