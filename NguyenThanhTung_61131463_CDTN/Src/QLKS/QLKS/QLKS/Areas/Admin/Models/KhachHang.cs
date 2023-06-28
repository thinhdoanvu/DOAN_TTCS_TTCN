using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace QLKS.Areas.Admin.Models
{
    public class KhachHang
    {
        public String hoten { get; set; }
        public String socmt { get; set; }
        public String tuoi { get; set; }
        public String sodt { get; set; }
        public KhachHang()
        {
        }
        public KhachHang(String hoten, String tuoi)
        {
            this.hoten = hoten;
            this.tuoi = tuoi;
        }
        public KhachHang(String hoten,String socmt, String tuoi,String sodt)
        {
            this.hoten = hoten;
            this.socmt = socmt;
            this.tuoi = tuoi;
            this.sodt = sodt;
        }
    }
    
}