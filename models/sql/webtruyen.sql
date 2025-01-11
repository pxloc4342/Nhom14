CREATE DATABASE IF NOT EXISTS webtruyen;

USE webtruyen;

CREATE TABLE truyen (
    id INT AUTO_INCREMENT PRIMARY KEY,          
    ten_truyen VARCHAR(255) NOT NULL,          
    tac_gia VARCHAR(255),                       
    mo_ta TEXT,                                  
    file_path VARCHAR(255) NOT NULL              
);

INSERT INTO truyen (ten_truyen, tac_gia, mo_ta, file_path) VALUES
('Chí Phèo', 'Nam Cao', 'Một câu chuyện nổi tiếng của Nam Cao...', '/views/use/chi-pheo.html'),
('Solo Leveling', 'Song', 'Truyện cảm động về cuộc đời Lão Hạc...', '/views/use/chi-pheo.html');
