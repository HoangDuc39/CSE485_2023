#a .Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình
select * from baiviet, theloai where baiviet.ma_tloai=theloai.ma_tloai and theloai.ten_tloai="Nhạc trữ tình";
#b.Liệt kê các bài viết của tác giả “Nhacvietplus”
select * from baiviet, tacgia where baiviet.ma_tgia=tacgia.ma_tgia and tacgia.ten_tgia="Nhacvietplus";
#c.Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào.
select ten_tloai from theloai where ma_tloai not in (select ma_tloai from baiviet group by ma_tloai);
#d.Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết.
select ma_bviet, tieude, ten_bhat, ten_tgia, ten_tloai, ngayviet from baiviet, tacgia, theloai where baiviet.ma_tgia=tacgia.ma_tgia and baiviet.ma_tloai=theloai.ma_tloai;
#e.Tìm thể loại có số bài viết nhiều nhất
select ten_tloai from theloai, baiviet where baiviet.ma_tloai=theloai.ma_tloai group by baiviet.ma_tloai limit 1;
#f.Liệt kê 2 tác giả có số bài viết nhiều nhất
select ten_tgia from tacgia, baiviet where baiviet.ma_tgia=tacgia.ma_tgia group by baiviet.ma_tgia limit 2;
#g
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

#h
SELECT * FROM baiviet WHERE (tieude LIKE '%yêu%' OR ten_bhat LIKE '%yêu%') OR (tieude LIKE '%thương%' OR ten_bhat LIKE '%thương%') OR (tieude LIKE '%anh%' OR ten_bhat LIKE '%anh%') OR (tieude LIKE '%em%' OR ten_bhat LIKE '%em%');

#i
CREATE VIEW vw_Music AS 
SELECT baiviet.*, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet 
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

#j
DELIMITER //

CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai VARCHAR(50))
BEGIN
    -- Kiểm tra xem thể loại có tồn tại không
    IF NOT EXISTS(SELECT 1 FROM theloai tl WHERE tl.ten_tloai = ten_tloai) THEN
        SELECT 'Không tìm thấy thể loại' AS message;
    END IF;
    
    -- Nếu tồn tại thì truy vấn danh sách bài viết của thể loại đó
    SELECT bv.*, tl.ten_tloai
    FROM baiviet bv
    JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
    WHERE tl.ten_tloai = ten_tloai;