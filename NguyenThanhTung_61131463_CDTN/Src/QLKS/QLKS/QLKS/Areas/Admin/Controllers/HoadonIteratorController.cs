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

namespace MVC.core
{
    public interface IIterator
    {
        tblHoaDon First();
        tblHoaDon Next();
        bool IsDone { get; }
        tblHoaDon CurrentItem { get; }
    }
    public class HoadonIteratorController : IIterator
    {
        List<tblHoaDon> _listTblHoaDon;
        int current = 0;
        int step = 1;

        public HoadonIteratorController(List<tblHoaDon> listTblHoaDon)
        {
            _listTblHoaDon = listTblHoaDon;
        }

        public bool IsDone 
        {
            get { return current >= _listTblHoaDon.Count; }
        }

        public tblHoaDon CurrentItem => _listTblHoaDon[current];

        public tblHoaDon First()
        {
            current = 0;
            if (_listTblHoaDon.Count > 0)
                return _listTblHoaDon[current];
            return null;
        }

        public tblHoaDon Next()
        {
            current += step;
            if (!IsDone)
                return _listTblHoaDon[current];
            else
                return null;
        }
    }
}