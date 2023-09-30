/*INSERT INTO tacgia (ma_tgia,ten_tgia,hinh_tgia) VALUES(7,'Nhacvietplus',NULL);
INSERT INTO baiviet(ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) VALUES
(8,'tieu de 5','bai hat 1', 3,'tom tat 1' , 'noi dung 1' ,6,NOW(),NULL);
INSERT INTO theloai(ma_tloai,ten_tloai) VALUES (6,'The loai 1');
INSERT INTO baiviet(ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) VALUES
(7,'yeu','bai hat 1', '4', 'tom tat 1', 'noi dung 1', 3, NOW(),null);
INSERT INTO baiviet(ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) VALUES
(9,'yeu','co yeu chu', 4, 'tom tat 1', 'noi dung 1', 3, NOW(),null);
*/
ALTER TABLE theloai COLUMN ma_tloai INT AUTO_INCREMENT;
/*Cau 1*/
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat
FROM baiviet
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
WHERE theloai.ten_tloai = "Nhac tru tinh";S
/*Cau 2*/
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.tomtat, baiviet.noidung
FROM baiviet
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
WHERE tacgia.ten_tgia = 'Nhacvietplus';
/*Cau 3*/
SELECT theloai.ma_tloai, theloai.ten_tloai
FROM theloai 
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
WHERE baiviet.ma_bviet IS NULL;
/*Cau 4*/
SELECT baiviet.ma_bviet,baiviet.tieude AS ten_baiviet, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai,baiviet.ngayviet
FROM baiviet
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;
/*Cau 5*/
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ten_tloai
ORDER BY so_bai_viet DESC
LIMIT 1;
/*Cau 6*/
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM tacgia
LEFT JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ten_tgia
ORDER BY so_bai_viet DESC
LIMIT 2;
/*Cau 7*/
SELECT ma_bviet, tieude , ten_bhat
FROM baiviet
WHERE ten_bhat LIKE '%yeu%' OR ten_bhat LIKE '%thuong%' OR ten_bhat LIKE '%anh%'OR ten_bhat LIKE '%em%';
/*Cau 8*/
SELECT ma_bviet, tieude , ten_bhat
FROM baiviet
WHERE ten_bhat LIKE '%yeu%' OR ten_bhat LIKE '%thuong%' OR ten_bhat LIKE '%anh%'OR ten_bhat LIKE '%em%' 
   OR tieude like '%yeu%' OR tieude LIKE '%thuong%' OR tieude LIKE '%anh%'OR tieude LIKE '%em%' ;
   

/*CREATE VIEW vw_Musisc AS 
SELECT baiviet.ma_bviet , baiviet.tieude AS ten_baiviet, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;*/

/*
DELIMITER //

CREATE PROCEDURE sp_DSBaiViet(IN ten_the_loai VARCHAR(50))
BEGIN 
 DECLARE ma_the_loai INT;
 
  SELECT ma_tloai INTO ma_the_loai FROM theloai WHERE ten_tloai = ten_the_loai;
  
  
   IF ma_the_loai IS NULL THEN
     SIGNAL SQLSTATE '45000'
     SET MESSAGE_TEXT = 'The loai khong ton tai';
   ELSE 
  
   SELECT ma_bviet, tieude, ten_bhat
   FROM baiviet
   WHERE ma_tloai = ma_the_loai;
   END IF;
END;
*/
/*cau 11 */
/*ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0;
DELIMITER 
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW 
BEGIN 
  UPDATE theloai
  SET SLBaiViet = SLBaiViet + 1
  WHERE ma_tloai = NEW.ma_tloai;
END;
*/
DELIMITER;

/*Cau 12*/
CREATE TABLE USER (
  uuid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(200) NOT NULL,
  PASSWORD VARCHAR(200) NOT NULL
);

SELECT *FROM theloai
	