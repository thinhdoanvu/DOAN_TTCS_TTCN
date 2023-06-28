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

namespace MVC.core2
{
    public interface IIterator2
    {
        tblPhieuDatPhong First();
        tblPhieuDatPhong Next();
        bool IsDone { get; }
        tblPhieuDatPhong CurrentItem { get; }
    }
    public class PhieuDatPhongIteratorController : IIterator2
    {
        List<tblPhieuDatPhong> _listTblPhieuDatPhong;
        int current = 0;
        int step = 1;
        public PhieuDatPhongIteratorController(List<tblPhieuDatPhong> listTblPhieuDatPhong)
        {
            _listTblPhieuDatPhong = listTblPhieuDatPhong;
        }
        public bool IsDone
        {
            get { return current >= _listTblPhieuDatPhong.Count; }
        }

        public tblPhieuDatPhong CurrentItem => _listTblPhieuDatPhong[current];

        public tblPhieuDatPhong First()
        {
            current = 0;
            if (_listTblPhieuDatPhong.Count >0)
            return _listTblPhieuDatPhong[current];
            return null;
        }

        public tblPhieuDatPhong Next()
        {
            current += step;
            if (!IsDone)
                return _listTblPhieuDatPhong[current];
            else
                return null;
        }
    }
}