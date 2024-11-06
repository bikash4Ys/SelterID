INSERT INTO users (name, email, password, gender, dob, address, emergency_contact, created_at, updated_at)
VALUES
('Taro Yamada', 'taro@example.com', '', 'male', '1995-05-10', 'Tokyo, Japan', '090-1234-5678', NOW(), NOW()),
('Hanako Suzuki', 'hanako@example.com','', 'female', '1996-06-15', 'Osaka, Japan', '090-2345-6789', NOW(), NOW()),
('Kenta Sato', 'kenta@example.com', '', 'male', '1997-07-20', 'Nagoya, Japan', '090-3456-7890', NOW(), NOW()),
('Yuki Tanaka', 'yuki@example.com', '', 'female', '1998-08-25', 'Sapporo, Japan', '090-4567-8901', NOW(), NOW()),
('Shota Yamamoto', 'shota@example.com', '', 'male', '1999-09-30', 'Fukuoka, Japan', '090-5678-9012', NOW(), NOW()),
('Sakura Kato', 'sakura@example.com', '', 'female', '2000-10-05', 'Kobe, Japan', '090-6789-0123', NOW(), NOW()),
('Hiroki Takahashi', 'hiroki@example.com', '', 'male', '2001-11-10', 'Yokohama, Japan', '090-7890-1234', NOW(), NOW()),
('Mai Nakamura', 'mai@example.com', '', 'female', '2002-12-15', 'Kyoto, Japan', '090-8901-2345', NOW(), NOW()),
('Shohei Watanabe', 'shohei@example.com', '', 'male', '1994-01-20', 'Hiroshima, Japan', '090-9012-3456', NOW(), NOW()),
('Mika Fujimoto', 'mika@example.com', '', 'female', '1993-02-25', 'Sendai, Japan', '090-0123-4567', NOW(), NOW()),
('Ryo Nagai', 'ryo@example.com', '', 'male', '1992-03-30', 'Saitama, Japan', '090-1234-5678', NOW(), NOW()),
('Akari Hasegawa', 'akari@example.com', '', 'female', '1991-04-05', 'Kagoshima, Japan', '090-2345-6789', NOW(), NOW()),
('Daiki Inoue', 'daiki@example.com', '', 'male', '1990-05-10', 'Shizuoka, Japan', '090-3456-7890', NOW(), NOW()),
('Aya Shimizu', 'aya@example.com', '', 'female', '1989-06-15', 'Okinawa, Japan', '090-4567-8901', NOW(), NOW()),
('Takuya Morita', 'takuya@example.com', '', 'male', '1988-07-20', 'Chiba, Japan', '090-5678-9012', NOW(), NOW()),
('Rina Saito', 'rina@example.com', '', 'female', '1987-08-25', 'Miyagi, Japan', '090-6789-0123', NOW(), NOW()),
('Kazuya Nakano', 'kazuya@example.com', '', 'male', '1986-09-30', 'Niigata, Japan', '090-7890-1234', NOW(), NOW()),
('Yuko Ueda', 'yuko@example.com', '', 'female', '1985-10-05', 'Toyama, Japan', '090-8901-2345', NOW(), NOW()),
('Keita Kojima', 'keita@example.com', '', 'male', '1984-11-10', 'Okayama, Japan', '090-9012-3456', NOW(), NOW()),
('Saki Ishikawa', 'saki@example.com', '', 'female', '1983-12-15', 'Fukushima, Japan', '090-0123-4567', NOW(), NOW());


UPDATE users 
SET password = '$2y$10$RzdkyZLUJQhGKoRxRVw8CeCeJaBC6UIW.dMugUvAbFAs.f5cQhRgK';