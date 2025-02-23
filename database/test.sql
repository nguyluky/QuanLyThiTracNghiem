
CREATE Table `diemdanh` (
    madiemdanh int(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    manhom int(11),
    ngaydiemdanh DATE,
    ngayhethan DATE,
    codediemdanh VARCHAR(20),
    Foreign Key (`manhom`) REFERENCES `nhom`(`manhom`)
);

DROP Table `diemdanh`;

CREATE Table `chitietdiemdanh` (
    madiemdanh INT(11),
    nguoidungid varchar(50),
    thoigiandiemdanh DATETIME,
    ipAddress VARCHAR(100)
);

DROP Table `chitietdiemdanh`;
-- SELECT * FROM `diemdanh`;

INSERT INTO `diemdanh` (`manhom`, `ngaydiemdanh`, `ngayhethan`, `codediemdanh`)
VALUES (1, '2020-12-12', '2020-12-12', '123456');

SELECT * FROM `nhom` WHERE `giangvien`='111111';
SELECT COUNT(*) FROM `chitietdiemdanh` WHERE madiemdanh=1 GROUP BY nguoidungid;

SELECT 
    DD.*, 
    (
        SELECT COUNT(*) 
        FROM chitietdiemdanh 
        WHERE madiemdanh=DD.madiemdanh
    ) as ddd,
    (
        SELECT COUNT(*) 
        FROM chitietnhom CTN
        WHERE CTN.manhom = DD.manhom
    ) as ss
FROM `diemdanh` DD WHERE ;

SELECT JSON_ARRAY(JSON_OBJECT(
'nguoidungid', nguoidungid,
'thoigiandiemdanh', thoigiandiemdanh,
'ipAddress', ipAddress
))
FROM chitietdiemdanh
WHERE madiemdanh=1;

SELECT JSON_ARRAYAGG(JSON_OBJECT(
    "id", ND.id,
    "hoten", ND.hoten,
    "avatar", ND.avatar
)) 
FROM chitietnhom CTN
JOIN nguoidung ND ON CTN.manguoidung = ND.id
WHERE CTN.manhom = 2
GROUP BY `CTN`.manhom;

SELECT * 
FROM chitietdiemdanh
WHERE madiemdanh=1;

INSERT INTO `diemdanh` (`title`, `manhom`, `ngaydiemdanh`, `ngayhethan`, `codediemdanh`)
VALUES ('Diem danh 1', 2, '2020-12-12', '2020-12-12', '123456');