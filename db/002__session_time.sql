CREATE TABLE user_sessions(
    -- Session id to be use in dashboard and reference
    session_id INT AUTO_INCREMENT PRIMARY KEY,

    -- User ID reference
    user_id INT NOT NULL,

    -- Session Attributes
    session_start DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    session_end DATETIME DEFAULT NULL,
    session_duration INT DEFAULT NULL,


    -- Constraints and Foreign KEy Implementation
    CONSTRAINT fk_user_sessions_user_id 
        FOREIGN KEY (user_id) 
        REFERENCES users(user_id) 
        ON DELETE CASCADE
        ON UPDATE CASCADE
);