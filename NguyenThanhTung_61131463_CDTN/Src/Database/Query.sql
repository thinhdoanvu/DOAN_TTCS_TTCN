--USE master
	--IF EXISTS(select * from sys.databases where name='dataQLKS')
--DROP DATABASE dataQLKS

--USE master
--CREATE DATABASE dataQLKS

use dataQLKS
create table tblHoaDon(
	ma_hd int NOT NULL IDENTITY(1,1) primary key,
	ma_nv int,
	ma_pdp int,
	ngay_tra_phong datetime,
	ma_tinh_trang int,
	tien_phong float,
	tien_dich_vu float,
	phu_thu float,
	tong_tien float
);
create table tblChucVu(
	ma_chuc_vu int NOT NULL IDENTITY(1,1) primary key,
	chuc_vu nvarchar(50)
);
create table tblDichVuDaDat(
	id int NOT NULL IDENTITY(1,1) primary key,
	ma_hd int,
	ma_dv int,
	so_luong int
);
create table tblDichVu(
	ma_dv int NOT NULL IDENTITY(1,1) primary key,
	ten_dv nvarchar(100),
	gia float,
	don_vi nvarchar(30),
	anh nvarchar(200),
	ton_kho int
);
create table tblKhachHang(
	ma_kh nvarchar(50) primary key,
	mat_khau nvarchar(50),
	ho_ten nvarchar(50),
	cmt nvarchar(30),
	sdt nvarchar(15),
	mail nvarchar(100),
	diem int
);
create table tblLoaiPhong(
	loai_phong int NOT NULL IDENTITY(1,1) primary key,
	mo_ta nvarchar(50),
	gia float,
	ti_le_phu_thu int,
	anh nvarchar(300)
);
create table tblTang(
	ma_tang int IDENTITY(1,1) primary key,
	ten_tang nvarchar(20)
);
create table tblNhanVien(
	ma_nv int IDENTITY(1,1) primary key,
	ho_ten nvarchar(50),
	ngay_sinh date,
	dia_chi nvarchar(100),
	sdt nvarchar(15),
	tai_khoan nvarchar(50),
	mat_khau nvarchar(50),
	ma_chuc_vu int
);
create table tblPhong(
	ma_phong int IDENTITY(1,1) primary key,
	so_phong nvarchar(10),
	loai_phong int,
	ma_tang int,
	ma_tinh_trang int
);
create table tblTinhTrangPhong(
	ma_tinh_trang int IDENTITY(1,1) primary key,
	mo_ta nvarchar(50)
);
create table tblTinhTrangHoaDon(
	ma_tinh_trang int IDENTITY(1,1) primary key,
	mo_ta nvarchar(50)
);
create table tblPhieuDatPhong(
	ma_pdp int IDENTITY(1,1) primary key,
	ma_kh nvarchar(50),
	ngay_dat datetime,
	ngay_vao datetime,
	ngay_ra datetime,
	ma_phong int,
	thong_tin_khach_thue nvarchar(400),
	ma_tinh_trang int
);
create table tblTinhTrangPhieuDatPhong(
	ma_tinh_trang int IDENTITY(1,1) primary key,
	tinh_trang nvarchar(50)
);
create table tblTinNhan(
	id int IDENTITY(1,1) primary key,
	ngay_gui datetime,
	ma_kh nvarchar(50),
	ho_ten nvarchar(100),
	mail nvarchar(100),
	noi_dung nvarchar(500)
);


alter table tblTinNhan
add CONSTRAINT fk_tin_nhan
FOREIGN KEY (ma_kh) REFERENCES tblKhachHang(ma_kh);

alter table tblDichVuDaDat
add CONSTRAINT fk_ma_hd
FOREIGN KEY (ma_hd) REFERENCES tblHoaDon(ma_hd);

alter table tblDichVuDaDat
add CONSTRAINT fk_ma_dv
FOREIGN KEY (ma_dv) REFERENCES tblDichVu(ma_dv);

alter table tblNhanVien
add CONSTRAINT fk_ma_cv
FOREIGN KEY (ma_chuc_vu) REFERENCES tblChucVu(ma_chuc_vu);

alter table tblHoaDon
add CONSTRAINT fk_ma_nv
FOREIGN KEY (ma_nv) REFERENCES tblNhanVien(ma_nv);

--alter table tblHoaDon
--add CONSTRAINT fk_ma_kh
--FOREIGN KEY (ma_kh) REFERENCES tblKhachHang(ma_kh);

alter table tblPhong
add CONSTRAINT fk_ma_lp
FOREIGN KEY (loai_phong) REFERENCES tblloaiPhong(loai_phong);

alter table tblPhong
add CONSTRAINT fk_ma_tang
FOREIGN KEY (ma_tang) REFERENCES tblTang(ma_tang);

--alter table tblHoaDon
--add CONSTRAINT fk_ma_phong
--FOREIGN KEY (ma_phong) REFERENCES tblPhong(ma_phong);

alter table tblHoaDon
add CONSTRAINT fk_ma_pdp
FOREIGN KEY (ma_pdp) REFERENCES tblPhieuDatPhong(ma_pdp);

alter table tblHoaDon
add CONSTRAINT fk_ma_tthd
FOREIGN KEY (ma_tinh_trang) REFERENCES tblTinhTrangHoaDon(ma_tinh_trang);

alter table tblPhong
add CONSTRAINT fk_ma_tt_2
FOREIGN KEY (ma_tinh_trang) REFERENCES tblTinhTrangPhong(ma_tinh_trang);

alter table tblPhieuDatPhong
add CONSTRAINT fk_tgd_ma_kh2
FOREIGN KEY (ma_kh) REFERENCES tblKhachHang(ma_kh);

alter table tblPhieuDatPhong
add CONSTRAINT fk_tgd_ma_phong_2
FOREIGN KEY (ma_phong) REFERENCES tblPhong(ma_phong);

alter table tblPhieuDatPhong
add CONSTRAINT fk_tgd_tt_2
FOREIGN KEY (ma_tinh_trang) REFERENCES tblTinhTrangPhieuDatPhong(ma_tinh_trang);

insert into tblDichVu values(N'Nước ngọt','10000',N'lon','/Content/Images/DichVu/1.png',50);
insert into tblDichVu values(N'Bia 333','10000',N'lon','/Content/Images/DichVu/2.png',50);
insert into tblDichVu values(N'Khăn lạnh','5000',N'chiếc','/Content/Images/DichVu/3.jpg',50);
insert into tblDichVu values(N'Bim Bim','10000',N'gói','/Content/Images/DichVu/4.jpg',50);
insert into tblDichVu values(N'Nước suối','10000',N'chai','/Content/Images/DichVu/5.png',50);
insert into tblDichVu values(N'Nước tăng lực','20000',N'chai','/Content/Images/DichVu/6.png',50);
insert into tblDichVu values(N'Thuốc lá','20000',N'bao','/Content/Images/DichVu/7.png',50);
insert into tblDichVu values(N'Cơm hộp','30000',N'hộp','/Content/Images/DichVu/8.jpg',50);

insert into tblChucVu values(N'Quản trị viên');
insert into tblChucVu values(N'Quản lý');
insert into tblChucVu values(N'Nhân viên');

insert into tblNhanVien values(N'Truong Giang','','',N'01677915896',N'admin',N'12345',1);
insert into tblNhanVien values(N'TG','','',N'01677915896',N'smod',N'12345',2);
insert into tblNhanVien values(N'tgiangfc','','',N'01677915896',N'mod',N'12345',3);

insert into tblLoaiPhong values(N'Phòng đơn','100000',20,'["/Content/Images/Phong/11.jpg","/Content/Images/Phong/12.jpg","/Content/Images/Phong/13.jpg"]');
insert into tblLoaiPhong values(N'Phòng đôi','150000',25,'["/Content/Images/Phong/21.jpg","/Content/Images/Phong/22.jpg","/Content/Images/Phong/23.jpg"]');
insert into tblLoaiPhong values(N'Phòng vip','200000',30,'["/Content/Images/Phong/31.jpg","/Content/Images/Phong/32.jpg"]');

insert into tblTang values(N'Tầng 1');
insert into tblTang values(N'Tầng 2');
insert into tblTang values(N'Tầng 3');

insert into tblTinhTrangPhong values(N'Trống');
insert into tblTinhTrangPhong values(N'Đang sử dụng');
insert into tblTinhTrangPhong values(N'Đang dọn');
insert into tblTinhTrangPhong values(N'Đang bảo trì');
insert into tblTinhTrangPhong values(N'Dừng sử dụng');

insert into tblTinhTrangHoaDon values(N'Chưa thanh toán');
insert into tblTinhTrangHoaDon values(N'Đã thanh toán');

insert into tblPhong values('101','1','1','1');
insert into tblPhong values('102','1','1','1');
insert into tblPhong values('103','1','1','1');
insert into tblPhong values('104','2','1','1');
insert into tblPhong values('105','2','1','1');
insert into tblPhong values('106','3','1','1');

insert into tblPhong values('201','1','2','1');
insert into tblPhong values('202','1','2','1');
insert into tblPhong values('203','1','2','1');
insert into tblPhong values('204','2','2','1');
insert into tblPhong values('205','2','2','1');
insert into tblPhong values('206','3','2','1');

insert into tblPhong values('301','1','3','1');
insert into tblPhong values('302','1','3','1');
insert into tblPhong values('303','1','3','1');
insert into tblPhong values('304','2','3','1');
insert into tblPhong values('305','2','3','1');
insert into tblPhong values('306','3','3','1');

insert into tblKhachHang values(N'ntg1',N'12345',N'NTG1',N'1311412131',N'0166776868','ntg@gmail.com',0);
insert into tblKhachHang values(N'ntg2',N'12345',N'NTG2',N'1311412131',N'0166776868','ntg2@gmail.com',0);
insert into tblKhachHang values(N'khach',N'12345',N'Khach',N'1311412131',N'0166776868','khach@gmail.com',0);

insert into tblTinhTrangPhieuDatPhong values(N'Đang đặt');
insert into tblTinhTrangPhieuDatPhong values(N'Đã xong');
insert into tblTinhTrangPhieuDatPhong values(N'Đã hủy');
insert into tblTinhTrangPhieuDatPhong values(N'Đã thanh toán');

insert into tblPhieuDatPhong values(N'ntg1','2018-04-19 21:35:28.170','2018-04-19 21:35:28.170','2018-04-26 21:35:28.170','7','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg2','2018-04-18 21:35:28.170','2018-04-18 21:35:28.170','2018-04-28 21:35:28.170','8','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'khach','2018-04-21 21:35:28.170','2018-04-21 21:35:28.170','2018-04-29 21:35:28.170','9','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg1','2018-04-19 21:35:28.170','2018-04-19 21:35:28.170','2018-04-21 21:35:28.170','7','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg2','2018-04-18 21:35:28.170','2018-04-18 21:35:28.170','2018-04-22 21:35:28.170','8','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'khach','2018-04-21 21:35:28.170','2018-04-21 21:35:28.170','2018-04-23 21:35:28.170','9','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg1','2018-04-22 21:35:28.170','2018-04-22 21:35:28.170','2018-04-24 21:35:28.170','7','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg2','2018-04-22 21:35:28.170','2018-04-22 21:35:28.170','2018-04-25 21:35:28.170','8','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'khach','2018-04-24 21:35:28.170','2018-04-26 21:35:28.170','2018-04-27 21:35:28.170','9','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg1','2018-04-25 21:35:28.170','2018-04-27 21:35:28.170','2018-04-30 21:35:28.170','1','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg2','2018-04-27 21:35:28.170','2018-04-27 21:35:28.170','2018-05-01 21:35:28.170','2','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'khach','2018-04-30 21:35:28.170','2018-05-02 21:35:28.170','2018-05-03 21:35:28.170','3','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg1','2018-05-01 21:35:28.170','2018-05-01 21:35:28.170','2018-05-04 21:35:28.170','4','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'khach','2018-05-03 21:35:28.170','2018-05-03 21:35:28.170','2018-05-05 21:35:28.170','5','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);
insert into tblPhieuDatPhong values(N'ntg2','2018-05-04 21:35:28.170','2018-05-04 21:35:28.170','2018-05-05 21:35:28.170','6','[{"hoten":"","socmt":null,"tuoi":"","sodt":null},{"hoten":"Nguyễn Thị B","socmt":null,"tuoi":"18","sodt":null}]',4);

insert into tblHoaDon values('1','1','2018-04-24 21:36:27.427','2','800000','0','0','800000');
insert into tblHoaDon values('1','2','2018-04-25 21:36:27.427','2','1100000','0','0','1100000');
insert into tblHoaDon values('1','3','2018-04-27 21:36:27.427','2','900000','0','0','900000');
insert into tblHoaDon values('1','4','2018-04-21 21:36:27.427','2','300000','0','0','300000');
insert into tblHoaDon values('1','5','2018-04-22 21:36:27.427','2','500000','0','0','500000');
insert into tblHoaDon values('1','6','2018-04-23 21:36:27.427','2','200000','0','0','200000');
insert into tblHoaDon values('1','7','2018-04-24 21:36:27.427','2','300000','0','0','300000');
insert into tblHoaDon values('1','8','2018-04-25 21:36:27.427','2','400000','0','0','400000');
insert into tblHoaDon values('1','9','2018-04-27 21:36:27.427','2','200000','0','0','200000');
insert into tblHoaDon values('1','10','2018-04-30 21:36:27.427','2','400000','50000','0','450000');
insert into tblHoaDon values('1','11','2018-05-01 21:36:27.427','2','500000','70000','0','570000');
insert into tblHoaDon values('1','12','2018-05-03 21:36:27.427','2','200000','80000','0','280000');
insert into tblHoaDon values('1','13','2018-05-04 21:36:27.427','2','600000','140000','0','740000');
insert into tblHoaDon values('1','14','2018-05-05 21:36:27.427','2','450000','10000','0','460000');
insert into tblHoaDon values('1','15','2018-05-05 21:36:27.427','2','400000','80000','0','480000');

insert into tblDichVuDaDat values('10','1','2');
insert into tblDichVuDaDat values('10','3','4');
insert into tblDichVuDaDat values('10','2','1');

insert into tblDichVuDaDat values('11','4','3');
insert into tblDichVuDaDat values('11','6','2');

insert into tblDichVuDaDat values('12','5','6');
insert into tblDichVuDaDat values('12','1','2');

insert into tblDichVuDaDat values('13','7','1');

insert into tblDichVuDaDat values('14','8','1');
insert into tblDichVuDaDat values('14','1','3');
insert into tblDichVuDaDat values('14','3','4');
