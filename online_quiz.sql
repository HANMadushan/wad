-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `exam_time_in_minutes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_minutes`) VALUES
(1, 'php', '30'),
(7, 'exam', '30'),
(10, 'Science', '20'),
(11, 'jsp', '25');

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(1, 'nilanka', 'php', '0', '0', '0', '2024-07-29'),
(2, 'nilanka', 'exam', '0', '0', '0', '2024-07-29'),
(3, 'nilanka', 'Science', '0', '0', '0', '2024-07-29'),
(4, 'nilanka', 'Science', '1', '0', '1', '2024-07-29'),
(5, 'nilanka', 'jsp', '1', '0', '1', '2024-07-29'),
(6, 'nilanka', 'jsp', '1', '0', '1', '2024-07-29'),
(7, 'nilanka', 'jsp', '1', '0', '1', '2024-07-29');


CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(1, '1', 'What is the input device ?', 'Webcam', 'Screen', 'Mouse', 'Speakers', 'Mouse', 'Science'),
(3, '1', '5 + 10 = ?', '10', '13', '15', '20', '15', 'jsp'),
(4, '1', '5+5', '10', '78', '89', '20', '10', '');

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'Nilanka', 'Madushan', 'nilanka', '12345', 'nilankamadushan810@gmail.com', '0717702401');

ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

