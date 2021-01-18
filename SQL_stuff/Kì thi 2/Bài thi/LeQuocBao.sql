create database Quanlysanbongdamini;
go 

use Quanlysanbongdamini;
go

create table San (
	MaSan varchar(10) primary key,
	TenSan nvarchar(50),
	SoTienGio int,
);

create table KhachHang (
	Sdt varchar(20) primary key,
	HoTen nvarchar(50)
);

create table DichVu (
	MaDV varchar(10) primary key,
	TenDV nvarchar(50),
	Sl int,
	DonGia int
);

create table PhieuDatSan (
	MaDS varchar(10) primary key,
	Sdt varchar(20),
	NgayDat date,
	NgayThiDau date,
	GioBatDau time,
	GioKetThuc time
);

create table HoaDon (
	SoHD varchar(10) primary key,
	NgayLap date,
	MaDS varchar(10)
);

create table CTHD (
	SoHD varchar(10) not null,
	MaDV varchar(10) not null,
	Sl int,
	DonGia int
);

alter table CTHD
add constraint PK_CTHD primary key (SoHD,MaDV);

alter table PhieuDatSan
add foreign key (Sdt) REFERENCES KhachHang(Sdt);

alter table CTHD
add foreign key (MaDV) REFERENCES DichVu(MaDV);

alter table HoaDon
add foreign key (MaDS) REFERENCES PhieuDatSan(MaDS);

alter table CTHD
add foreign key (SoHD) REFERENCES HoaDon(SoHD);

alter table PhieuDatSan
ADD CONSTRAINT DF_PhieuDatSan
DEFAULT (getdate()) FOR NgayDat;

alter table DichVu
ADD CONSTRAINT DF1_DichVu
DEFAULT ('>= 0') FOR Sl;

alter table DichVu
ADD CONSTRAINT DF2_DichVu
DEFAULT ('>= 0') FOR DonGia;

alter table CTHD
ADD CONSTRAINT DF1_CTHD
DEFAULT ('>= 0') FOR Sl;

alter table CTHD
ADD CONSTRAINT DF2_CTHD
DEFAULT ('>= 0') FOR DonGia;

INSERT INTO San(MaSan, TenSan, SoTienGio) VALUES ('MS01', N'Sân 01', 100000);
INSERT INTO San(MaSan, TenSan, SoTienGio) VALUES ('MS02', N'Sân 02', 200000);
INSERT INTO San(MaSan, TenSan, SoTienGio) VALUES ('MS03', N'Sân 03', 300000);
INSERT INTO San(MaSan, TenSan, SoTienGio) VALUES ('MS04', N'Sân 04', 400000);
INSERT INTO San(MaSan, TenSan, SoTienGio) VALUES ('MS05', N'Sân 05', 500000);

INSERT INTO KhachHang(Sdt, HoTen) VALUES ('1234567891', N'Nguyễn Văn 1');
INSERT INTO KhachHang(Sdt, HoTen) VALUES ('1234567892', N'Nguyễn Văn 2');
INSERT INTO KhachHang(Sdt, HoTen) VALUES ('1234567893', N'Nguyễn Văn 3');
INSERT INTO KhachHang(Sdt, HoTen) VALUES ('1234567894', N'Nguyễn Văn 4');
INSERT INTO KhachHang(Sdt, HoTen) VALUES ('1234567895', N'Nguyễn Văn 5');

INSERT INTO DichVu(MaDV, TenDV, Sl, DonGia) VALUES ('DV01', N'Dịch vụ 1', 1, 10000);
INSERT INTO DichVu(MaDV, TenDV, Sl, DonGia) VALUES ('DV02', N'Dịch vụ 2', 2, 20000);
INSERT INTO DichVu(MaDV, TenDV, Sl, DonGia) VALUES ('DV03', N'Dịch vụ 3', 3, 30000);
INSERT INTO DichVu(MaDV, TenDV, Sl, DonGia) VALUES ('DV04', N'Dịch vụ 4', 4, 40000);
INSERT INTO DichVu(MaDV, TenDV, Sl, DonGia) VALUES ('DV05', N'Dịch vụ 5', 5, 50000);

INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS01', N'1234567891', '', '2020-01-01', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS02', N'1234567892', '', '2020-01-02', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS03', N'1234567893', '', '2020-01-03', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS04', N'1234567894', '', '2020-01-04', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS05', N'1234567895', '', '2020-01-05', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS06', N'1234567895', '', '2020-01-06', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS07', N'1234567894', '', '2020-01-07', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS08', N'1234567893', '', '2020-01-08', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS09', N'1234567892', '', '2020-01-09', '8:00', '9:00');
INSERT INTO PhieuDatSan(MaDS, Sdt, NgayDat, NgayThiDau, GioBatDau, GioKetThuc) VALUES ('MaDS10', N'1234567891', '', '2020-01-10', '8:00', '9:00');

INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD01', '', 'MaDS01');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD02', '', 'MaDS02');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD03', '', 'MaDS03');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD04', '', 'MaDS04');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD05', '', 'MaDS05');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD06', '', 'MaDS06');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD07', '', 'MaDS07');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD08', '', 'MaDS08');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD09', '', 'MaDS09');
INSERT INTO HoaDon(SoHD, NgayLap, MaDS) VALUES ('HD10', '', 'MaDS10');

INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD01', 'DV01', 1, 100000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD02', 'DV02', 2, 200000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD03', 'DV03', 3, 300000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD04', 'DV04', 4, 400000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD05', 'DV05', 5, 500000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD06', 'DV05', 6, 600000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD07', 'DV04', 7, 700000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD08', 'DV03', 8, 800000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD09', 'DV02', 9, 900000);
INSERT INTO CTHD(SoHD, MaDV, Sl, DonGia) VALUES ('HD10', 'DV01', 10, 100000);

select kh.HoTen, kh.Sdt
from KhachHang kh inner join PhieuDatSan pds on kh.Sdt = pds.Sdt
where (YEAR(pds.NgayDat) = 2019)

select CTHD.MaDV ,dv.TenDV
from DichVu dv inner join CTHD on dv.MaDV = CTHD.MaDV
			   inner join HoaDon hd on hd.SoHD = CTHD.SoHD
where (MONTH(hd.NgayLap) = 7 or MONTH(hd.NgayLap) = 8 or MONTH(hd.NgayLap) = 9 and YEAR(hd.NgayLap) = 2019)
group by CTHD.MaDV ,dv.TenDV

select CTHD.MaDV ,dv.TenDV, sum(CTHD.Sl) as TongSoLuongDichVu
from DichVu dv inner join CTHD on dv.MaDV = CTHD.MaDV
group by CTHD.MaDV ,dv.TenDV

select COUNT(pds.NgayDat) as SoLanMua , kh.HoTen, kh.Sdt
from KhachHang kh inner join PhieuDatSan pds on kh.Sdt = pds.Sdt
group by kh.HoTen, kh.Sdt
having COUNT(pds.NgayDat) = (
	select top 1 COUNT(pds.NgayDat) as SoLanMua
	from KhachHang kh inner join PhieuDatSan pds on kh.Sdt = pds.Sdt
	group by kh.HoTen, kh.Sdt
	)

--5
--a
create function TongTien (@SoHoaDon varchar(10))
returns int
as
begin
return (select sum(Sl*DonGia)
		from CTHD
		where SoHD = @SoHoaDon );
end;

--6
--a
create proc themdata (
	@ms varchar(10),
	@tensan nvarchar(50),
	@tiengio int = 0
	)
as
begin 
	update San
	set MaSan = @ms,
		TenSan = @tensan,
		SoTienGio = @tiengio
end;
