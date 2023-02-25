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
