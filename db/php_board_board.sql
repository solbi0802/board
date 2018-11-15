-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: php_board
-- ------------------------------------------------------
-- Server version	5.7.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thread` int(11) unsigned NOT NULL,
  `depth` int(11) unsigned NOT NULL DEFAULT '0',
  `writer` varchar(20) NOT NULL,
  `pwd` varchar(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `wdate` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,1000,0,'관리자','$2y$10$KxpbvvNJmFXRDSphiyG/mODARCPqcbc1jRVMERfetrZnAkYhNaYoW','공지사항','안녕하세요~ 관리자입니다.\r\n게시판 이용에 대해 알려 드리겠습니다.\r\n\r\n먼저 말씀드리기에 앞서, 홈페이지 방문에 감사드립니다.\r\n다음 수칙을 꼭 지켜주세요!\r\n1. 비난및 욕설 금지\r\n2. 광고성 게시글 금지 \r\n','2018-11-15 14:32:07',1),(2,2000,0,'하이루','$2y$10$7pDikHMNH6G0JyWaWTw/DONX7qhLd5y8NyOpUIuF3QgdYXSm0xyp6','Hello World!','HELLO WORLD!\r\nHELLO GUYS! ','2018-11-15 14:32:52',0),(3,3000,0,'손님','$2y$10$hCl.ByMaiUpBwoXvByuWMu1aG.xYpe526b8IGhTViQgQK19jUfQsi','안녕하세요!','첫 방문 첫 게시물 입니다 ^^\r\n반가워요~','2018-11-15 14:35:16',0),(4,4000,0,'doit','$2y$10$HMyLHRM1JjJqL4X3Phr3fOZvfzGnSH67JprRKbH/igPI5zFhAm7MK','JUST DO IT!','NIKE','2018-11-15 14:37:59',0),(5,5000,0,'날씨봇','$2y$10$uzInsp.SFn5gVuP31I0dkOTsvCGwOyNuVPCRuGjGW1Dh/DyoLiSSC','오늘 날씨는?','흐림 \r\n2˚/14˚ 체감온도 13.8˚\r\n미세먼지 78㎍/㎥보통\r\n초미세먼지40㎍/㎥나쁨\r\n오존지수 0.012ppm좋음','2018-11-15 14:39:19',2),(6,6000,0,'랄라','$2y$10$q1UY2/L75etc4wGuEV8G1O44CVP5pZY/R3k.JQq8qScmkbdZDLWh.','노래 추천','폴킴- 너를 만나\r\n','2018-11-15 14:41:18',0),(7,7000,0,'lemontree','$2y$10$gr2fG77dOn.ki8O/I1lYq.OI7gSMyHZNz/ZLQ6w4yVNVJgm.r0BKa','lemon','lemon!','2018-11-15 14:43:08',1),(8,8000,0,'고사미','$2y$10$IGes0.LfvGypPoNy8ezncOH.S2D7HdeeisaENZcZccjXfBvY/YY0G','2019학년도 대학수학능력시험','수험생 여러분 힘내세요!','2018-11-15 14:45:49',1),(9,9000,0,'이동진','$2y$10$9uQWuKi/b0frqCqRI7ihvex4Zlfdw70GUCWO2w9LfayvFjVzRcwam','영화 추천해주세요~','요즘 볼만한 영화 있나요?','2018-11-15 14:46:29',1),(11,11000,0,'meme','$2y$10$kRyZiwk7ckgGeHkoG4A3h.Up1xPSFHC4TBIlhmHXIcLeMxjAn4yQm','오늘 하루도 파이팅!','다들 힘내요!!\r\n파이팅!\r\nㅎㅎㅎㅎ','2018-11-15 14:49:20',0),(12,12000,0,'아이스','$2y$10$1JWNC5g9Y3gXWbkGIKhJO.DZYu3zPGl3kPWCD7Wo/Wl.3BJMvX6ie','아이스크림 먹고싶다!','배스킨 라빈스 31\r\n나뚜루\r\n고디바!\r\n','2018-11-15 14:50:01',1),(13,11999,1,'크림','1234','저두요!!','>배스킨 라빈스 31\r\n>나뚜루\r\n>고디바!\r\n저두 먹고싶어요 ㅋㅋㅋ','2018-11-15 14:50:56',0),(14,7999,1,'힘내','1234','파이팅!','>수험생 여러분 힘내세요!\r\n파이팅!!! ','2018-11-15 14:51:26',0),(15,13000,0,'미세미세','$2y$10$OJ7LIFTe9nHKIZHwkDzH6Ow88fVkfVH9wdmYiZ.n6ySYJEWW0mquq','미세먼지','마스크 꼭 끼고 외출하세요!!\r\n마스크 필수!','2018-11-15 14:55:02',2),(16,14000,0,'안녕하세요','$2y$10$E1ty6fQQ2EvtvRisFyHape6oPjokZRH9oQUYkpoOJkcK31ZH9ZXLG','php 개발자입니다.','PHP!!','2018-11-15 14:56:48',1),(17,13999,1,'자바','1234','└JAVA 개발자입니다.','>PHP!!\r\nJAVA!!','2018-11-15 14:57:22',1);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-15 15:17:32
