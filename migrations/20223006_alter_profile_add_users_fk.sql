USE ams;

ALTER TABLE profiles
ADD COLUMN user_id int(11),
ADD CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;

ALTER TABLE users
DROP FOREIGN KEY users_ibfk_1;

ALTER TABLE users
DROP COLUMN profile_id;