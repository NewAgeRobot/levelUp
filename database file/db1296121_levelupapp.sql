-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2015 at 02:51 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1296121_levelupapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbackPrompts`
--

CREATE TABLE IF NOT EXISTS `feedbackPrompts` (
  `ID` int(11) NOT NULL,
  `Prompt` text NOT NULL,
  `Subjects` int(11) NOT NULL DEFAULT '0',
  `Interests` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbackPrompts`
--

INSERT INTO `feedbackPrompts` (`ID`, `Prompt`, `Subjects`, `Interests`) VALUES
(1, 'Did you have fun in any class this week?', 1, 0),
(2, 'Did you get praised for your work in any class this week?', 1, 0),
(3, 'Did you find any subject really difficult to get your head around?', 1, 0),
(4, 'Did you surprise yourself by being able to do something you didn''t think you could do?', 1, 0),
(5, 'Did you do better than you thought you would in any subject this week?', 1, 0),
(6, 'Is there any subject that you don''t mind getting homework for?', 1, 0),
(7, 'Which subjects do you spend the most time working on?', 1, 0),
(8, 'Is there any subject that other people say you''re really good at?', 1, 0),
(9, 'It is possible to combine thinking with your heart and your head: Try exploring what you can do when you combine creativity and more practical subjects.', 0, 1),
(10, 'Helping people doesn''t just mean being a doctor or lawyer, why not try combining "helping people" with some of your favorite subjects?', 0, 1),
(11, 'It is possible to make your hobby your job, try exploring film, TV or video games?', 0, 1),
(12, 'Are you the person everyone goes to for advice? Perhaps you''re a good problem solver - why not see how you can combine this with your favourite subjects?', 0, 1),
(13, 'Love sport? You don''t have to be a famous athlete to make a career out of sport, try exploring what options are out there to make fitness a career.', 0, 1),
(14, 'Studying business doesn''t necessarily lead to an office job, have a look at what career opportunities are listed on the course websites, you might be surprised!', 0, 1),
(15, 'You may have a hidden talent you didn''t realise you had: what is it that other people say you''re really good at?', 0, 1),
(16, 'Still unsure what you want to do? Have you considered Level 6 or FETAC - they can be a useful and affordable way of trying out a subject before making the big leap to college.', 0, 1),
(17, 'When picking your CAO courses make sure you research the college as well as the course. Check out the college website and social media pages.', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `interestFeedback`
--

CREATE TABLE IF NOT EXISTS `interestFeedback` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Email` text NOT NULL,
  `Creativity` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Biology` int(11) NOT NULL,
  `Physics` int(11) NOT NULL,
  `Chemistry` int(11) NOT NULL,
  `Construction` int(11) NOT NULL,
  `Technology` int(11) NOT NULL,
  `Business` int(11) NOT NULL,
  `Languages` int(11) NOT NULL,
  `Nature` int(11) NOT NULL,
  `Travel` int(11) NOT NULL,
  `Working_With_Your_Hands` int(11) NOT NULL,
  `Helping_People` int(11) NOT NULL,
  `Performance` int(11) NOT NULL,
  `Music` int(11) NOT NULL,
  `Media` int(11) NOT NULL,
  `Film` int(11) NOT NULL,
  `TV` int(11) NOT NULL,
  `Internet` int(11) NOT NULL,
  `Health_and_Fitness` int(11) NOT NULL,
  `Problem_Solving` int(11) NOT NULL,
  `Video_Games` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interestsTable`
--

CREATE TABLE IF NOT EXISTS `interestsTable` (
  `ID` int(11) NOT NULL,
  `CourseTitle` text NOT NULL,
  `CourseCode` text NOT NULL,
  `CourseLevel` int(11) NOT NULL,
  `Synopsis` text NOT NULL,
  `Points` int(11) NOT NULL,
  `Institute` text NOT NULL,
  `County` text NOT NULL,
  `Hyperlink` text NOT NULL,
  `Creativity` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Biology` int(11) NOT NULL,
  `Physics` int(11) NOT NULL,
  `Chemistry` int(11) NOT NULL,
  `Construction` int(11) NOT NULL,
  `Technology` int(11) NOT NULL,
  `Business` int(11) NOT NULL,
  `Languages` int(11) NOT NULL,
  `Nature` int(11) NOT NULL,
  `Travel` int(11) NOT NULL,
  `Working With Your Hands` int(11) NOT NULL,
  `Helping People` int(11) NOT NULL,
  `Performance` int(11) NOT NULL,
  `Music` int(11) NOT NULL,
  `Media` int(11) NOT NULL,
  `Film` int(11) NOT NULL,
  `TV` int(11) NOT NULL,
  `Internet` int(11) NOT NULL,
  `Health and Fitness` int(11) NOT NULL,
  `Problem Solving` int(11) NOT NULL,
  `Video Games` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interestsTable`
--

INSERT INTO `interestsTable` (`ID`, `CourseTitle`, `CourseCode`, `CourseLevel`, `Synopsis`, `Points`, `Institute`, `County`, `Hyperlink`, `Creativity`, `Science`, `Biology`, `Physics`, `Chemistry`, `Construction`, `Technology`, `Business`, `Languages`, `Nature`, `Travel`, `Working With Your Hands`, `Helping People`, `Performance`, `Music`, `Media`, `Film`, `TV`, `Internet`, `Health and Fitness`, `Problem Solving`, `Video Games`) VALUES
(1, 'Applied Engineering', 'DK640', 6, 'The aim of this programme is to create graduates who have the capability to carry out skilled craft activities under supervision and have the technical skills to assist a variety of engineering and construction activities.  They shall also be able to communicate design, specification and production requirements between both clients and other professionals within industry. Students on the programme will cover a broad spectrum of Engineering Technology including, but not limited to, elements of carpentry and joinery, plumbing and electrical trades giving them a broad range of skills whilst not being specialised in any one area.  The programme will enable advanced access for learners who demonstrate an interest and capacity to more advanced Engineering programmes within DKIT and elsewhere.  PLease note that Graduates will not be qualified as tradespersons.  ', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/higher-certificate-applied-engineering', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(2, 'Higher Certificate in Arts in Culinary Arts', 'DK650', 6, 'As a chef in the skilled profession of cookery, you need to be creative with food and enjoy working with your hands. The course covers the theory and practice of all aspects of classical, international and ethnic cookery, along with hospitality knowledge and skills, catering technology, catering sectors and systems, menu planning, nutrition, and communications.', 240, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk650', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(3, 'Hospitality Studies', 'DK651', 6, 'There is an increased demand within the tourism industry for people who are experienced in more than one area of work. Responsibilities could include periods based in the reception, kitchen, bar, accommodation department or restaurant. This course is particularly attractive to people who enjoy variety and who hope to gain all-round experience. Training covers both theory and practice and includes up to 6 months paid work experience in industry.', 182, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk651', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Agriculture', 'DK685', 6, 'Agriculture is of major significance in Ireland and most farms are family operated with the farmer being the owner, manager and often provider of most of the labour. Farmers increasingly require a knowledge of science which can be applied to the management of the farm environment, ensuring that environmental protection, food safety, animal welfare and handling and operation of machinery are considered in the context of animal and crop production. The farmer also requires some knowledge of Economics and Business Management skills.', 330, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk685', 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Business and Management', 'DK710', 7, 'On this programme you will learn how to gather, assess, analyse and present business information. You will study management and marketing strategies at international level, develop skills in logical thinking and problem-solving, and have the option of becoming fluent in a modern language. After this three year course, if you wish to complete your honors degree, you can progress from this course directly on to the BBS(Hons).', 150, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk710', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(6, 'Business and Technology', 'DK711', 7, 'Develop your IT skills and apply them directly to an office or business setting! You will be prepared for a career in the high-tech office environment of today, through a combination of business education and IT skills. The Programme – in addition to covering business and management modules – will also cover modules that will prepare you for work in office administration, sales support, IT systems, IT support and web design.', 175, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk711', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Computing', 'DK721', 7, 'Discover the fundamental principles of computing in first year, and develop specialist knowledge and expertise in second and third year of your studies in one of the three main areas of computing.', 215, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk721', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(8, 'Engineering - Electrical and Electronic Systems', 'DK740', 7, 'Electronic and Electrical Engineers design and create the enabling technologies that allow us to monitor, manage and control energy supplies. They also design and produce the information and data processing technology we need, the communication systems and smart technologies that are behind the remote management of wind and solar energy among other things.', 125, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk740', 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Engineering - Mechanical Engineering', 'DK742', 7, 'Graduates in Mechanical engineering combine the basic knowledge of physical sciences and engineering education with experience and expertise to invent, design and manufacture, run and maintain mechanical systems equipment and tools in all branches of industry', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk742', 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Engineering - Civil Engineering', 'DK744', 7, 'Civil Engineering has always been concerned with the relationship between physical infrastructure and the environment. Our infrastructure must be sustainable. This means the sustainability of our water supplies, drainage and flood management and our sanitation systems. National economic development also depends on the sustainability of our transportation systems, including our road and rail network.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk744', 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Construction Technology', 'DK745', 7, 'The building industry is concerned with the provision, maintenance and renewal of Ireland’s building assets. Any new building, be it for residential, industrial, commercial, educational, medical or other purposes, must be designed, constructed, maintained, operated and removed in a sustainable way. This is done to ensure that the visual appearance, structure, thermal, visual, aural and space conditions of the building are in keeping with its purpose, while ensuring the ease of movement and health and safety of its occupants.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk745', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Hospitality Management', 'DK750', 7, 'The hospitality industry is one of the world''s fastest growing industries. It offers excellent career opportunities both in Ireland and internationally for suitably qualified people. The starting point for your management career in this industry is this Degree from Dundalk Institute of Technology, which has been designed to help you acquire the business management skills and the specialist knowledge of the industry that you will need to succeed.', 265, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk750', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Event Management', 'DK752', 7, 'Do you aspire to work within the Meetings, Incentive Travel, Conferences and Exhibitions sector? If so, then this degree is for you! Successful managers are needed within this industry, and our course has been developed to enable graduates keep abreast of current issues, emerging trends and contemporary management practices. This innovative, vocationally relevant and challenging degree will prepare you for career progression to senior levels.', 160, 'DkIT', 'Louth', 'https://www.dkit.ie/hospitality/courses/bachelor-business-event-management', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(14, 'Bachelor of Arts in Culinary Arts', 'DK753', 7, 'The Bachelor of Arts in Culinary Arts aims to prepare learners for a successful career in the culinary arts industry. The programme is designed to facilitate the academic, personal and professional development of the learner and to develop highly skilled professionals. The programme will support students in the development of their knowledge, artistic ability and strategic understanding of the theory and practice of all aspects of classical, international and ethnic cookery, along with hospitality knowledge and skills. It will give the students an insight into the most up to date catering technology employed in this dynamic insustry and equip them with the skills and confidence to achieve career goals. An integral element of the course is the opportunity to experience a six month placement in year 2 of the course in a selection of hospitality establishments locally, nationally and internationally.', 230, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/bachelor-arts-culinary-arts', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(15, 'Sport, Exercise and Enterprise', 'DK763', 7, 'This programme is aimed at developing graduates with a range of expertise in Sport & Exercise studies and Enterprise. Students will be given the opportunity to develop their practical skills working with specific target groups (children, older adults, special populations) in the local community. All elements of the programme are aimed at providing students with real life skills that will be transferable upon completion of the degree, and indeed are vital in seeking employment.', 267, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk763', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(16, 'Community Youth Work (Restricted)', 'DK767', 7, 'The main aim of the Bachelor of Arts in Community Youth Work is to develop community youth work leaders who have a high level of knowledge, skills, confidence and competence in a range of activities to enable them to work effectively in a youth work and community development setting.', 200, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk767', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(17, 'Media Arts and Technologies', 'DK769', 7, 'The aim of this programme is to equip graduates with the necessary knowledge, core skills and competencies to work in a variety of roles within the media arts & technology sectors, particularly in the areas of these sectors where the merging of creative practices and skills utilising media and information technologies are developed. In the multi-platform world of today, new evolving digital skills are being sought to produce high end content for simultaneous delivery on not only traditional print and broadcast media, but on the web, on mobile devices, and using the many existing and developing social media tools. The overall aim is to provide students with these core hard and soft skills. These skills are highly transferable between the various creative industries.', 115, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/ba-media-arts-technologies', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0),
(18, 'Theatre and Film Practice', 'DK770', 7, 'This programme replaces the current 3-year Level 7 BA in Performing Arts with a redeveloped 3-year Level 7 degree programme entitled BA in Theatre & Film Practice. It broadens the focus of the theatre content of the former degree (beyond that of acting) and builds on the existing strong links developed between the BA in Performing Arts and the BA (Hons) in Film & Television Production, due to the ongoing successful collaboration between these two programmes over the years.Thus, this programme will provide a solid grounding in the practical application of both theatre and film production skills, a mix of which are currently unavailable to prospective students on the island of Ireland at this level, along with key acting skills and a theoretical foundation.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/ba-theatre-film-practice', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(19, 'Science - Applied Bioscience', 'DK781', 7, 'Graduates from this programme will be competent Biologists with a broad background of knowledge in addition to the analytical, practical and interpersonal skills appropriate for a modern-day science graduate. The programme will provide students with a broad basis in modern Biology with a strong foundation in subjects such as Biochemistry, Microbiology, Molecular Biology, Cell Biology and Ecology. They will learn how to integrate this knowledge into a range of applied Biosciences such as Biotechnology, Immunology, Industrial Microbiology and Bio-pharmaceutical Science.', 215, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk781', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Science - Pharmaceutical Science', 'DK783', 7, 'This programme aims to educate and train scientists for employment in the pharmaceutical and chemical industries, a major growth area of economic and strategic importance both in Ireland and Worldwide.', 335, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk783', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Veterinary Nursing', 'DK784', 7, '"This 3-year, level 7 course provides students with the animal care, knowledge and nursing skills to allow them to work as professional registered veterinary nurses (RVNs). All relevent practical competencies are covered in relation to dogs, cats, horses, farm animals and a range of exotic species"', 425, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk784', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(22, 'Accounting and Finance', 'DK810', 8, 'The Bachelor of Arts Degree in Accounting & Finance provides you with an interesting and challenging opportunity to gain a broad education through the study of accounting and related disciplines. The programme will give you a sound basis for future employment in Accountancy and will give you the option of further study in accounting and related areas.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk810', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(23, 'Marketing', 'DK812', 8, 'Our BBS Honours Degree in Marketing is market focused and very exciting, delivering a series of learning activities designed with your career in mind. It is aimed at students who wish to pursue a commercial career within the marketing industry. It places participants upon a platform of career focused continued learning, by means of highly interactive learning activities including global projects run in association with real clients and fellow students in USA and Australia. Our contacts within industry enable us to offer our students personal interaction with the movers and shakers of enterprise. This is done through our " executive sessions" where invited guests present to students in a question and answer format.', 305, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk812', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(24, 'Business Studies', 'DK816', 8, 'The Bachelor of Business (Honours) at DkIT is a management award that facilitates the development of the students’ interpersonal and intellectual capabilities. This Level 8 Honours degree is completed over 3 years. The programme will promote your academic, intellectual and personal development while enabling you to work as a business professional that will develop, lead and sustain Irish industry on a national and international basis.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk816', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(25, 'Business (Years 1 and 2 at Monaghan Institute)', 'DK817', 8, '', 0, 'DkIT', 'Louth', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(26, 'Computing in Games Development', 'DK820', 8, 'This honours degree aims to provides you with comprehensive knowledge and skill in developing software and, in particular, the opportunity to gain expertise in the development of computer games. Additional places available in September 2014!', 305, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk820', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(27, 'Computing', 'DK821', 8, 'Become a skilled software developer with a particular expertise in internet-based applications. Additional places are available for September 2014!', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk821', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(28, 'Computing with French', 'DK822', 8, 'This programme has been developed to offer students a strong mix of both computing and French language studies.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk822', 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(29, 'Building Surveying', 'DK830', 8, 'Environmental awareness, sustainability issues, economic restraint and building legislation dictate that increasing emphasis is placed on the effective utilisation of proposed and existing buildings. In particular, property owners, developers and purchasers are encouraged to assess more closely the life cycle performance of proposed and existing buildings and the possible reuse of existing buildings as an alternative to demolition and rebuilding. In such a climate, there is a growing demand for building surveying expertise.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk830', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'Applied Music (Restricted)', 'DK860', 8, 'Interested in a degree with a difference? Are you dedicated and committed to developing your musical skills to a high standard? Our B.A (Honours) in Applied Music can offer you an exciting blend of traditional, classical, rock and pop with music technology! We welcome students from different music backgrounds and with a diversity of interests. The programme is both challenging and enriching, and gives you the chance to participate in a wide range of music activities. Enhanced by state of the art facilities, the BA (Hons) Applied Music programme creates opportunities for study of a diverse range of genres, technologies and activities in music.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk860', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 'Digital Humanities', 'DK861', 8, 'The traditional areas of the arts and humanities are being revolutionised by the impact of Digital Media that are revolutionising how we experience, interact with and understand the world and each other. Vast volumes of information are readily accessible at a click, “crowd-sourcing” transforms research and social networks drive the “Arab Spring” across North Africa. This BA (Hons) Humanities degree will deepen your understanding of particular fields of academic study in the traditional areas of the Arts; History-English Literature and Culture-Archaeology-Politics & Society; while applying the new resources and forms of writing presented by Digital Media to explore the emerging field of Digital Humanities, where the disciplines of the Arts/Humanities and Digital Media intersect.', 335, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk861', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(32, 'Social Care', 'DK862', 8, 'This four-year honours degree programme is about social care, a profession characterised by working in partnership with people who experience marginalisation, or disadvantage, or who have special needs. You will explore and analyse the development of current and future trends in social care in Ireland and how legislation in this area is drafted and regulated.', 305, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk862', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(33, 'Communications in Creative Media', 'DK863', 8, 'Recognising the continued need for highly creative practitioners and critical thinkers this widely recognised innovative and multi-disciplinary programme was revamped in 2014 to ensure it remained to the forefront of trends within the creative media industries while also remaining as one of the leading Creative Media programme’s in the country. The 4 year Honours Degree now includes Work Placement and a wide variety of electives, which allow students to specialise in areas such as Design, Audio, Media Production and Web Development.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/cmedia', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0),
(34, 'Film and TV Production', 'DK864', 8, 'This programme aims to update and modernise  the current Level 7 and Level 8 BA and BA (Hons) in Video and Film Production programmes with an ab-initio 4-year Level 8 degree programme in the Section of Creative Media to ensure that we continue to meet with with changing industry requirements for our graduates. This programme aims to build on the nationwide reputation that the Section of Creative Media has gained due to the successes of these current programmes since their commencement in 2005 and 2008 respectively.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/filmtv', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0),
(35, 'Production of Music and Audio', 'DK865', 8, 'This programme is aimed at producing professionals for the recording industry capable of assuming key creative and architectural roles in the process of analyzing, developing and realizing the creative intentions of the recording artist to a commercial conclusion.The programme is designed to continuingly strengthen the students’ understanding and awareness of a wide range of aspects of Music Production. This is achieved through the delivery of a suite of carefully developed modules covering Production, Technology, Theory, Craft, Musicianship, Research and Personal Development. The artistry of modern Music Production assumes a diverse range of interrelated disciplines. Creativity, science, recording technologies and techniques, musical appreciation and awareness, business, interpersonal skills and more, combine to form the rich diversity of strands that is the BA (Hons) Production of Music and Audio.', 320, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/ba-hons-production-music-audio', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(36, 'General Nursing', 'DK870', 8, 'This four year programme prepares students for their role as a registered nurse working with adults with a range of illnesses both in hospital as well as community based health care settings. The programme provides the student with many opportunities to acquire the knowledge, skills and attitudes required for the safe delivery of effective nursing care.', 395, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk870', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(37, 'Intellectual Disability Nursing', 'DK872', 8, 'Intellectual disability nursing studies equip you to provide stimulation, emotional support, and nursing care for persons with intellectual disability, of all ages and abilities, in residential and community settings. It emphasises the importance of working with other professionals, and family members, in planning and implementing a therapeutic programme of care, to provide for the needs of those that cannot be met independently, and to help them achieve greater independence.', 365, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk872', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(38, 'Psychiatric Nursing', 'DK874', 8, 'The primary objective of psychiatric nursing is to facilitate the maximum development of the mental health of the individual who has psychiatric problems and to promote mental health in the wider community. A major focus of psychiatric nursing is to rehabilitate patients so that as many as possible can live full lives in community settings, and to support those already living in the community. At the heart of the role of the psychiatric nurse is the ability to establish therapeutic relationships with individuals and their families. Good communication skills are essential to form and maintain these relationships.', 380, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk874', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(39, 'Early Childhood Studies', 'DK876', 8, 'This programme provides professional training and education for students to become early childhood specialists, who as experienced practitioners, lay the foundations for children’s success at school and for their lifelong health and well-being.', 300, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk876', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(40, 'Midwifery', 'DK877', 8, 'As a student on this programme you will develop the professional knowledge, skills and understanding needed to fulfil the role of a midwife. The role involves taking responsibility for the care of Mothers and their babies during pregnancy, labour and the postnatal period in collaboration with the multidisciplinary health care team.', 415, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk877', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(41, 'Health and Physical Activity', 'DK880', 8, 'Physical inactivity is a key modifiable risk factor in the cause of modern health problems including obesity and diabetes. This programme provides education in the areas of health awareness, physical activity and well-being.', 340, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk880', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(42, 'Environmental Bioscience', 'DK881', 8, 'This is a new 4-year Honours Degree programme which commenced in September 2014. The aim of this programme is to produce graduates with knowledge, skills and competencies in the key areas of ecology, environmental biotechnology, environmental monitoring, analysis and risk assessment. Graduates of this programme will be able to make a significant contribution to the resolution of environmental problems and the implementation of sustainable solutions.   It is particularly suitable for students who enjoy Biology and have an interest in environmental matters.', 310, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/bsc-hons-environmental-bioscience', 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 'Agriculture', 'DK882', 8, 'This is a new 4-year Honours Degree programme which will commence in September 2015. The aim of this programme is to produce graduates with knowledge, skills and competencies to respond effectively to current and future developments in Agriculture and the Agri-Food Industry.  The programme will provide graduates with a strong foundation in science, business and agriculture and will specifically develop skills and knowledge in the areas of animal and crop production, animal husbandry and biosecurity, health and safety, agricultural mechanisation, financial and business management, entrepreneurship and innovation, environmental protection and the production and processing of safe, quality-assured food. ', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/programmes/bsc-hons-agriculture', 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 'Multimedia Web Development', 'DK890', 8, 'This four-year honours degree programme aims to produce graduates who have strong creative and technical design skills in Multimedia Web Applications Development. Graduates will be multi-disciplinary. Graduates from this degree programme will be able to generate creative content for interactive media. They will be able to design and develop sophisticated, database driven, interactive applications for the web and other media.', 0, 'DkIT', 'Louth', 'https://www.dkit.ie/courses/dk890', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(45, 'International Business', 'AC120', 8, '"The programme focuses on the international aspects of business, especially the challenges of operating in the dynamic global environment.  This is achieved by combining a mix of theory, practice and work experience.  Lectures are interactive environments where students are encouraged to exchange ideas and opinions.  There is a strong emphasis on developing the student’s personal skills such as public speaking and debating.  This is supported by the culturally diverse learning environment at American College Dublin with a student body drawn from over sixty countries.  On completion of the third year students gain invaluable work experience by undertake an eight-week internship in a multinational firm."', 220, 'American College Dublin', 'Dublin', 'http://www.acd.ie/academics/courses/business-department/ba-hons-international-business', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(46, 'Liberal Arts', 'AC137', 8, '"The BA in Liberal Arts is designed to prepare students for a number of future careers in following areas:\nFields of business, Social services, Administration, Teaching, Research, Media and broadcasting and Performing arts"', 275, 'American College Dublin', 'Dublin', 'http://www.acd.ie/academics/courses/liberal-arts-department/bachelor-arts-hons-liberal-arts', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(47, '1st Year Art and Design (Common Entry) (Restricted)', 'AD101', 8, '"Are you interested in a career in Art or Design? Do you respond to the world around you visually? Are you a creative, imaginative person looking to develop new forms of visual expression or communication?"', 0, 'National College of Art and Design', 'Dublin', 'http://www.ncad.ie/undergraduate/first-year/', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 'Design or Fine Art, and Education - Second Level Teaching (Restricted)', 'AD202', 8, '"Are you the type of person who likes to work with other people, to improve the quality of peoples’ lives, to make a difference? Are you interested in using art, craft and design as a way of exploring how we live?"', 0, 'National College of Art and Design', 'Dublin', 'http://www.ncad.ie/undergraduate/school-of-education/design-or-fine-art-education/', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 'Product Design (Restricted)', 'AD212 ', 8, '"Are you an inquisitive, creative, enthusiastic problem solver? Are you interested in how things work and why things look the way that they do? Do you want to create a better world through design?"', 0, 'National College of Art and Design', 'Dublin', 'http://www.ncad.ie/undergraduate/school-of-design/ba-hons-ma-product-design/', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(50, 'Visual Culture', 'AD215', 8, '"Are you fascinated by the spectrum of human creativity: art, design, architecture, film, media, aesthetics? Interested in history and the objects, processes, institutions and concepts of art and design in the contemporary world?"', 350, 'National College of Art and Design', 'Dublin', 'http://www.ncad.ie/undergraduate/school-of-visual-culture/', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(51, 'Applied Science in Food and Business Management', 'AS201', 7, '"This programme will enhance students’ knowledge and skills within these areas of food technology, food innovation and entrepreneurship, food safety management and auditing.  The course is ideal for individuals who are considering setting up their own food business, artisan food producers or individuals seeking employment within the food industry."', 285, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS201&&ver=en', 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(52, 'Home Economics with Biology - second level teaching', 'AS001', 8, 'The Bachelor of Arts (Education, Home Economics and Biology) and Professional Master of Education (with Home Economics) is a concurrent teacher education degree leading to a National Framework of Qualifications (NFQ) Level 9 master’s level award. After four years students will be awarded a (Bachelor of Arts) B.A. (Education, Home Economics and Biology); a NFQ level 8 honours degree. In order to qualify to teach, students must progress into Stage 5 which carries the award Professional Master of Education (P.M.E.) at NFQ Level 9.  Upon graduation students will meet all the Teaching Council requirements to be registered as a Newly Qualified Teacher (NQT) in Home Economics and Science & Biology. The programme is an integrated five year process. Students do not have to compete for a place in the fifth stage. However, students must reach the required standard of H2.2 after Stage 4 before they can progress into Stage 5.', 510, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS001&&ver=en', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 'Home Economics with Religious Education - second level teaching', 'AS002', 8, 'The Bachelor of Arts (Education, Home Economics and Religious Education) and Professional Master of Education (with Home Economics) is a concurrent teacher education degree leading to a National Framework of Qualifications (NFQ) Level 9 master’s level award. After four years students will be awarded a (Bachelor of Arts) B.A. (Education, Home Economics and Religious Education); a NFQ level 8 honours degree. In order to qualify to teach, students must progress into Stage 5 which carries the award Professional Master of Education (P.M.E.) at NFQ Level 9.  Upon graduation students will meet all the Teaching Council requirements to be registered as a Newly Qualified Teacher (NQT) in Home Economics and Religious Education.', 440, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS002&&ver=en', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Home Economics with Irish - second level teaching', 'AS003', 8, 'The Bachelor of Arts (Education, Home Economics and Gaeilge) and Professional Master of Education (with Home Economics) is a concurrent teacher education degree leading to a National Framework of Qualifications (NFQ) Level 9 master’s level award. After four years students will be awarded a (Bachelor of Arts) B.A. (Education, Home Economics and Gaeilge); a NFQ level 8 honours degree. In order to qualify to teach, students must progress into Stage 5 which carries the award Professional Master of Education (P.M.E.) at NFQ Level 9.  Upon graduation students will meet all the Teaching Council requirements to be registered as a Newly Qualified Teacher (NQT) in Home Economics and Gaeilge.', 410, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS003&&ver=en', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 'Home Economics with Economics - second level teaching', 'AS004', 8, 'The Bachelor of Arts (Education, Home Economics and Economics) and Professional Master of Education (with Home Economics) is a concurrent teacher education degree leading to a National Framework of Qualifications (NFQ) Level 9 master’s level award. After four years students will be awarded a (Bachelor of Arts) B.A. (Education, Home Economics and Economics); a NFQ level 8 honours degree. In order to qualify to teach, students must progress into Stage 5 which carries the award Professional Master of Education (P.M.E.) at NFQ Level 9.  Upon graduation students will meet all the Teaching Council requirements to be registered as a Newly Qualified Teacher (NQT) in Home Economics and Economics.', 415, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS004&&ver=en', 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 'Food and Business Management', 'AS051', 8, '"The course is aimed at students with a strong interest in food and food product development, nutrition and health and for students who are interested in developing a diverse range of entrepreneurial skills and business acumen"', 265, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS051&&ver=en', 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(57, 'Health and Disability Studies', 'AS052', 8, '"This Bachelor of Arts programme is designed to explore the concepts and principles of Health, Wellness and Disability in the 21st century. The programme will give the student  a critical understanding of the issues that people encounter in relation to health & wellness and disability. Students will examine the opportunities and challenges involved in developing and delivering services that are appropriate, accessible and equitable. Students will explore the evolution and development of  theory, policy and practice in these areas. This degree will inform the student about the wider issues in Health, Wellness & Disability and  offer them an array of options once they have completed the programme of study."', 230, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS052&&ver=en', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(58, 'Textiles/ Fashion and Design with Business Management (Restricted)', 'AS053', 8, '"The course aims to meet the needs of students who have a strong interest in textiles, fashion and design and wish to study artistic, theoretical and technical aspects of textiles and fashion design in a stimulating environment while also acquiring a sound mastery of the knowledge base of business management"', 0, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS053&&ver=en', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 'General Nursing', 'AS110', 8, 'The Bachelor of Nursing Science (BNSc) – General, is a four year degree pre-registration programme.  On completion of the programme graduates will be eligible to register as a General Nurse with An Bord Altranais having obtained an honours degree awarded by NUI Galway. The programme is offered in conjunction with Sligo General Hospital and other Health Service Executive organisations and groups in the Western region.  The overall aim of this programme is to enable students to become nurses who are knowledgeable, insightful, questioning, skilled and caring.', 405, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS110&&ver=en', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(60, 'Intellectual Disability Nursing', 'AS130', 8, 'The Bachelor of Nursing Science (BNSc) – Intellectual Disability, is a four year degree pre-registration programme. On completion of the programme graduates will be eligible to register as an Intellectual Disability Nurse with An Bord Altranais having obtained an honours degree awarded by NUI Galway. The programme is offered in conjunction with Cregg House and other Health Service Executive organisations and groups in the Western region. The overall aim of this programme is to enable students to become nurses who are knowledgeable, insightful, questioning, skilled and caring.', 370, 'St.Angela''s College, Sligo', 'Sligo', 'http://www.stangelas.nuigalway.ie/departments/course_details.php?id=AS130&&ver=en', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(61, 'Electronics and Computer Engineering', 'BN001', 6, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice      \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 180, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn001.html', 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 'Computing (Information Technology)', 'BN002', 6, 'First Year Subjects Include:\nComputer Systems\nNetworking Basics\nPersonal and Professional Development\nWeb Development\nAlgorithmic Problem Solving        \nFundamentals of Programming\nComputer Architecture\nMathematics for Computing\nRouters and Routing Basics', 250, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn002.html', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(63, 'Business', 'BN003', 6, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElectives : French PLC 1a or Spanish - Ab Initio 1a or Spanish PLC 1a or German - Ab Initio 1a or German PLC 1a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1 or People Management & Development   \nAccounting\nBusiness Management\nCommunication Skills', 180, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn003.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(64, 'Mechatronic Engineering', 'BN009', 7, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice       \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 190, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn009.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(65, 'Business and Information Technology', 'BN010', 7, 'First Year Subjects Include:\nBusiness Mathematics and Statistics\nBusiness Administration\nBusiness Information Systems\nEconomics\nExploring Web Design        \nAccounting\nBusiness Management\nCommunication Skills\nSkills for Problem Solving', 185, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn010.html', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(66, 'Applied Social Studies in Social Care', 'BN011', 7, 'First Year Subjects Include:\nFundamentals of Sociology\nCommunication & the Learning Environment\nIntroduction to Disability Studies\nIntroduction to Creative Studies\nProfessional Practice 1 - Context\nFundamentals of Psychology        \nDevelopmental Psychology\nSocial Institutions in Irish Society\nCommunication Structures & Skills\nPromoting Health & Well being\nProfessional Practice 1 - Provision\nCreative Studies in Social Care Settings', 320, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn011.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(67, 'Computer Engineering', 'BN012', 7, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice      \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 185, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn012.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(68, 'Computing (Information Technology)', 'BN013', 7, 'First Year Subjects Include:\nComputer Systems\nNetworking Basics\nPersonal and Professional Development\nWeb Development\nAlgorithmic Problem Solving      \nFundamentals of Programming\nComputer Architecture\nMathematics for Computing\nRouters and Routing Basics', 250, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn013.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(69, 'Business', 'BN014', 7, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElective -French PLC 1a or Spanish Ab Initio 1a or Spanish PLC 1a or German Ab Initio 1a or German PLC 1a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1 or People Management & Development 1\nAccounting\nBusiness Management\nComunication Skills', 180, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn014.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(70, 'Engineering (Common Entry - Computer Engineering,Mechatronics)', 'BN015', 7, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice     \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 180, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn015.html', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(71, 'Business (Common Entry - Acc & Finance,Business,Bus with IT,Intl Bus)', 'BN016', 7, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElectives : French - PLC 1a or Spanish - Ab Initio 1a or Spanish - PLC 1a or German - Ab Initio 1a or German - PLC 1 a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1\nAccounting\nBusiness Management\nCommunication Skills', 105, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn016.html', 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 'International Business', 'BN017', 7, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics and Statistics\nElective: French PLC 1a or Spanish Ab-Initio 1 a or Spanish PLC 1a or German Ab-Initio 1a or German PLC1a or French Ab-Initio 1a or *English for Academic Purposes 1\nAccounting\nBusiness Management\nCommunication Skills', 180, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/BN017.html', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 'Sports Management and Coaching', 'BN020', 7, 'First Year Subjects Include:\nLong Term Athelete Development\nAnatomy & Physiology\nContemporary Sports Management\nAccounting\nBusiness Information Systems\nCoaching Theory and Practice      \nCoaching Children\nCommunication Skills', 320, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn020.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(74, 'Creative Digital Media', 'BN021', 7, 'First Year Subjects Include: \nPersonal Development\nWeb Development\nDigital Photography\nWriting for Digital Media\nIntroduction to Digital Media\nVisual Creativity      \nVisual Communications\nUniversal Design\nDigital Imaging\nMultimedia Authoring', 300, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn021.html', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0),
(75, 'Horticulture', 'BN022', 7, 'First Year Subjects Include: \nBusiness Administration\nPlant Identification and Classification\nApplied Science and Mathematics\nPractical Training in Horticulture\nComputer Applications\nPersonal and Professional Development      \nThe Horticulture Sector\nBasic Concepts of Law\nTechnical Drawing\nSoil Science and Plant Nutrition\nMachinery for Horticulture\nPlant Biology and Physiology', 105, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn022.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 'Social and Community Development', 'BN025', 7, 'First Year Subjects Include: \nFundamentals of Sociology\nIntroduction to Culture\nPrinciples of Community Development\nCommunication and the Learning Environment\nLaw Crime and Community\nFundamentals of Psychology\nIrish Culture and Society\nSocial Policy\nIntroduction to Addictive Behaviours\nGroup Dynamics and Development\nCommunity Arts\nCommunity Development Practice', 280, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn025.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(77, 'Early Childhood Care and Education', 'BN030', 7, 'First Year Subjects Include:\nIntroduction to Drama & Movement\nSociology of Childhood\nHealth & Well -Being in the Early Years\nIntroduction to Child Centered Practice\nCommunications & Personal Development\nChild Development\nIntroduction to Art & Music\nSocial Institutions & the Early Years\nHealth & Safety in the Early Years\nEarly Learning\nGroup & Team Dynamics in the Childcare Sector', 300, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn030.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(78, 'Business', 'BN101', 8, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElective -French PLC 1a or Spanish Ab Initio 1a or Spanish PLC 1a or German PLC 1a or German Ab Initio 1a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1 or People Management & Development       \nAccounting\nBusiness Management\nCommunication Skills', 220, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn101.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);
INSERT INTO `interestsTable` (`ID`, `CourseTitle`, `CourseCode`, `CourseLevel`, `Synopsis`, `Points`, `Institute`, `County`, `Hyperlink`, `Creativity`, `Science`, `Biology`, `Physics`, `Chemistry`, `Construction`, `Technology`, `Business`, `Languages`, `Nature`, `Travel`, `Working With Your Hands`, `Helping People`, `Performance`, `Music`, `Media`, `Film`, `TV`, `Internet`, `Health and Fitness`, `Problem Solving`, `Video Games`) VALUES
(79, 'Business and Information Technology', 'BN103', 8, 'First Year Subjects Include:\nBusiness Mathematics and Statistics\nBusiness Administration\nBusiness Information Systems\nEconomics\nExploring Web Design      \nAccounting\nBusiness Management\nCommunication Skills\nSkills for Problem Solving', 230, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn103.html', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(80, 'Computing (Information Technology)', 'BN104', 8, 'First Year Subjects Include:\nComputer Systems\nNetworking Basics\nPersonal and Professional Development\nWeb Development\nAlgorithmic Problem Solving       \nFundamentals of Programming\nComputer Architecture\nMathematics for Computing\nRouters and Routing Basics', 275, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn104.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(81, 'Applied Social Studies in Social Care', 'BN107', 8, 'First Year Subjects Include: \nFundamentals of Sociology\nCommunication & the Learning Environment\nIntroduction to Disability Studies\nIntroduction to Creative Studies\nProfessional Practice 1 - Context\nFundamentals of Psychology      \nDevelopmental Psychology\nSocial Institutions in Irish Society\nCommunication Structures & Skills\nPromoting Health & Well being\nProfessional Practice 1 - Provision\nCreative Studies in Social Care Settings', 320, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn107.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(82, 'Engineering (Common Entry - Computer Engineering,Mechatronics)', 'BN108', 8, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice       \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 0, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn108.html', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(83, 'Business (Common Entry - Acc & Finance,Business,Bus with IT,Intl Bus)', 'BN109', 8, 'Students who apply for this course will be offered a choice of four streams at the commencement of first year. Students can opt for Year 1 of the Bachelor of Business (Honours) (BN101) or Year 1 of the Bachelor of Business (Honours) in Information Technology (BN103) or Year 1 of the Bachelor of Business (Honours) in International Business (BN110) or Year 1 of the Bachelor of Business (Honours) in Accounting and Finance (BN114) .', 0, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn109.html', 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 'International Business', 'BN110', 8, 'First Year Subjects Include:\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics and Statistics\nElective:\nFrench PLC 1a or Spanish Ab-Initio 1a or Spanish PLC 1a or German Ab-Initio 1a or German PLC1a or French Ab Initio 1a or *English for Academic Purposes 1        \nAccounting\nBusiness Management\nCommunication Skills', 245, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/BN110.html', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 'Sports Management and Coaching', 'BN111', 8, 'First Year Subjects Include: \nLong Term Athlete Development\nAnatomy & Physiology\nContemporary Sports Management\nAccounting\nBusiness Information Systems\nCoaching Theory and Practice       \nCoaching Children\nCommunication Skills', 320, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn111.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(86, 'Creative Digital Media', 'BN112', 8, 'First Year Subjects Include:\nEconomics 1\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElectives : French PLC 1a or Spanish - Ab Initio 1a or Spanish PLC 1a or German - Ab Initio 1a or German PLC 1a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1 or People ', 300, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn112.html', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0),
(87, 'Horticulture', 'BN113', 8, '"If you’re the active, outdoorsy, entrepreneurial type, who’s creative and hands-on; if you’re interested in the environment, where your food is grown and how parks and golf courses are designed and cared for; then you should probably look no further than Horticulture"', 220, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn113.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 'Accounting and Finance', 'BN114', 8, 'First Year Subjects Include:\nAccounting\nEconomics\nBusiness Administration\nBusiness Information Systems\nBusiness Mathematics & Statistics\nElectives : French PLC 1a or Spanish - Ab Initio 1a or Spanish PLC 1a or German - Ab Initio 1a or German PLC 1a or French Ab Initio 1a or Irish Culture and Society or Exploring Web Design or English for Academic Purposes 1 or People Management & Development\nBusiness Management\nCommunication Skills', 240, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn114.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(89, 'Social and Community Development', 'BN115', 8, 'First Year Subjects Include: \nFundamentals of Sociology\nIntroduction to Culture\nPrinciples of Community Development\nCommunication and the Learning Environment\nLaw Crime and Community\nFundamentals of Psychology       \nIrish Culture and Society\nSocial Policy\nIntroduction to Addictive Behaviours\nGroup Dynamics and Development\nCommunity Arts\nCommunity Development Practice', 280, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn115.html', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(90, 'Computer Engineering in Mobile Systems', 'BN117', 8, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice        \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications & Networks', 255, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn117.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(91, 'Early Childhood Care and Education', 'BN118', 8, 'First Year Subjects Include:\nIntroduction to Drama & Movement\nSociology of Childhood\nHealth & Well -Being in the Early Years\nIntroduction to Child Centered Practice\nCommunications & Personal Development  \nChild Development\nIntroduction to Art & Music\nSocial Institutions & the Early Years\nHealth & Safety in the Early Years\nEarly Learning\nGroup & Team Dynamics in the Childcare Sector', 300, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn118.html', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(92, 'Digital Forensics and Cyber Security', 'BN120', 8, 'First Year Subjects Include:\nComputer Systems\nNetworking Basics\nPersonal and Professional Development\nWeb Development\nAlgorithmic Problem Solving    \nFundamentals of Programming\nComputer Architecture\nMathematics for Computing\nRouters and Routing Basics', 275, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn120.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(93, 'Mechatronic Engineering', 'BN121', 8, 'First Year Subjects Include:\nPersonal Development with Computer Applications\nDigital Electronics\nEngineering Science\nCircuit Theory\nWorkshop Practice      \nMathematics\nAnalogue Electronics\nProgramming\nElectrical Science\nIntroduction to Data Communications and Networks', 220, 'Blanchardstown I.T.', 'Dublin', 'http://www.itb.ie/StudyatITB/bn105.html', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `savedCourses`
--

CREATE TABLE IF NOT EXISTS `savedCourses` (
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `CourseCode` text NOT NULL,
  `CourseLevel` int(11) NOT NULL,
  `CourseTitle` text NOT NULL,
  `CoursePoints` int(11) NOT NULL,
  `CourseCollege` text NOT NULL,
  `CourseURL` text NOT NULL,
  `SavedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Position` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedCourses`
--

INSERT INTO `savedCourses` (`ID`, `Email`, `CourseCode`, `CourseLevel`, `CourseTitle`, `CoursePoints`, `CourseCollege`, `CourseURL`, `SavedDate`, `Position`) VALUES
(70, 'sean@gmail.com', 'DK685', 6, 'Agriculture', 330, 'DkIT', 'https://www.dkit.ie/courses/dk685', '2015-05-16 00:48:41', 9),
(69, 'sean@gmail.com', 'DK783', 7, 'Science - Pharmaceutical Science', 335, 'DkIT', 'https://www.dkit.ie/courses/dk783', '2015-05-16 00:48:40', 8),
(68, 'sean@gmail.com', 'AD101', 8, '1st Year Art and Design (Common Entry) (Restricted)', 0, 'National College of Art and Design', 'http://www.ncad.ie/undergraduate/first-year/', '2015-05-16 00:48:08', 7),
(65, 'sean@gmail.com', 'DK863', 8, 'Communications in Creative Media', 300, 'DkIT', 'https://www.dkit.ie/cmedia', '2015-05-14 00:04:45', 6),
(66, 'sean@gmail.com', 'DK864', 8, 'Film and TV Production', 300, 'DkIT', 'https://www.dkit.ie/filmtv', '2015-05-14 00:05:48', 5),
(67, 'sean@gmail.com', 'DK860', 8, 'Applied Music (Restricted)', 0, 'DkIT', 'https://www.dkit.ie/courses/dk860', '2015-05-15 12:51:10', 3),
(61, 'sean@gmail.com', 'DK770', 7, 'Theatre and Film Practice', 0, 'DkIT', 'https://www.dkit.ie/programmes/ba-theatre-film-practice', '2015-05-12 22:54:59', 1),
(56, 'sean@gmail.com', 'DK650', 6, 'Higher Certificate in Arts in Culinary Arts', 240, 'DkIT', 'https://www.dkit.ie/courses/dk650', '2015-05-12 19:56:52', 2),
(62, 'sean@gmail.com', 'DK812', 8, 'Marketing', 305, 'DkIT', 'https://www.dkit.ie/courses/dk812', '2015-05-12 22:55:01', 0),
(64, 'sean@gmail.com', 'DK781', 7, 'Science - Applied Bioscience', 215, 'DkIT', 'https://www.dkit.ie/courses/dk781', '2015-05-13 23:54:24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `storedInterests`
--

CREATE TABLE IF NOT EXISTS `storedInterests` (
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Interest0` text NOT NULL,
  `Interest1` text NOT NULL,
  `Interest2` text NOT NULL,
  `NumCourse` int(11) NOT NULL DEFAULT '0',
  `CurrentCourse` int(11) NOT NULL DEFAULT '0',
  `County0` text NOT NULL,
  `County1` text NOT NULL,
  `County2` text NOT NULL,
  `County3` text NOT NULL,
  `County4` text NOT NULL,
  `County5` text NOT NULL,
  `County6` text NOT NULL,
  `County7` text NOT NULL,
  `County8` text NOT NULL,
  `County9` text NOT NULL,
  `County10` text NOT NULL,
  `County11` text NOT NULL,
  `County12` text NOT NULL,
  `County13` text NOT NULL,
  `County14` text NOT NULL,
  `Level0` int(11) NOT NULL,
  `Level1` int(11) NOT NULL,
  `Level2` int(11) NOT NULL,
  `Seed` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storedInterests`
--

INSERT INTO `storedInterests` (`ID`, `Email`, `Interest0`, `Interest1`, `Interest2`, `NumCourse`, `CurrentCourse`, `County0`, `County1`, `County2`, `County3`, `County4`, `County5`, `County6`, `County7`, `County8`, `County9`, `County10`, `County11`, `County12`, `County13`, `County14`, `Level0`, `Level1`, `Level2`, `Seed`) VALUES
(25, 'sean@gmail.com', 'Science', '', '', 15, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '4');

-- --------------------------------------------------------

--
-- Table structure for table `subjectFeedback`
--

CREATE TABLE IF NOT EXISTS `subjectFeedback` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Email` text NOT NULL,
  `English` tinyint(1) NOT NULL,
  `Maths` tinyint(1) NOT NULL,
  `Irish` tinyint(1) NOT NULL,
  `History` tinyint(1) NOT NULL,
  `Geography` tinyint(1) NOT NULL,
  `Home_Economics` tinyint(1) NOT NULL,
  `Accounting` tinyint(1) NOT NULL,
  `Economics` tinyint(1) NOT NULL,
  `Business` tinyint(1) NOT NULL,
  `Biology` tinyint(1) NOT NULL,
  `Physics` tinyint(1) NOT NULL,
  `Chemistry` tinyint(1) NOT NULL,
  `Art` tinyint(1) NOT NULL,
  `Music` tinyint(1) NOT NULL,
  `Construction_Studies` tinyint(1) NOT NULL,
  `French` tinyint(1) NOT NULL,
  `German` tinyint(1) NOT NULL,
  `Italian` tinyint(1) NOT NULL,
  `Spanish` tinyint(1) NOT NULL,
  `Arabic` tinyint(1) NOT NULL,
  `Classical_Studies` tinyint(1) NOT NULL,
  `Hebrew_Studies` tinyint(1) NOT NULL,
  `Ancient_Greek` tinyint(1) NOT NULL,
  `Latin` tinyint(1) NOT NULL,
  `Applied_Mathematics` tinyint(1) NOT NULL,
  `Physics_and_Chemistry` tinyint(1) NOT NULL,
  `Agricultural Economics` tinyint(1) NOT NULL,
  `Engineering` tinyint(1) NOT NULL,
  `Design_and_Communication_Graphics` tinyint(1) NOT NULL,
  `Religious_Education` tinyint(1) NOT NULL,
  `Russian` tinyint(1) NOT NULL,
  `Japanese` tinyint(1) NOT NULL,
  `Technology` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectsTable`
--

CREATE TABLE IF NOT EXISTS `subjectsTable` (
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `English` tinyint(1) NOT NULL,
  `Maths` tinyint(1) NOT NULL,
  `Irish` tinyint(1) NOT NULL,
  `History` tinyint(1) NOT NULL,
  `Geography` tinyint(1) NOT NULL,
  `Home_Economics` tinyint(1) NOT NULL,
  `Accounting` tinyint(1) NOT NULL,
  `Economics` tinyint(1) NOT NULL,
  `Business` tinyint(1) NOT NULL,
  `Biology` tinyint(1) NOT NULL,
  `Physics` tinyint(1) NOT NULL,
  `Chemistry` tinyint(1) NOT NULL,
  `Art` tinyint(1) NOT NULL,
  `Music` tinyint(1) NOT NULL,
  `Construction_Studies` tinyint(1) NOT NULL,
  `French` tinyint(1) NOT NULL,
  `German` tinyint(1) NOT NULL,
  `Italian` tinyint(1) NOT NULL,
  `Spanish` tinyint(1) NOT NULL,
  `Arabic` tinyint(1) NOT NULL,
  `Classical_Studies` tinyint(1) NOT NULL,
  `Hebrew_Studies` tinyint(1) NOT NULL,
  `Ancient_Greek` tinyint(1) NOT NULL,
  `Latin` tinyint(1) NOT NULL,
  `Applied_Mathematics` tinyint(1) NOT NULL,
  `Physics_and_Chemistry` tinyint(1) NOT NULL,
  `Agricultural_Economics` tinyint(1) NOT NULL,
  `Engineering` tinyint(1) NOT NULL,
  `Design_and_Communication_Graphics` tinyint(1) NOT NULL,
  `Religious_Education` tinyint(1) NOT NULL,
  `Russian` tinyint(1) NOT NULL,
  `Japanese` tinyint(1) NOT NULL,
  `Technology` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectsTable`
--

INSERT INTO `subjectsTable` (`ID`, `Email`, `English`, `Maths`, `Irish`, `History`, `Geography`, `Home_Economics`, `Accounting`, `Economics`, `Business`, `Biology`, `Physics`, `Chemistry`, `Art`, `Music`, `Construction_Studies`, `French`, `German`, `Italian`, `Spanish`, `Arabic`, `Classical_Studies`, `Hebrew_Studies`, `Ancient_Greek`, `Latin`, `Applied_Mathematics`, `Physics_and_Chemistry`, `Agricultural_Economics`, `Engineering`, `Design_and_Communication_Graphics`, `Religious_Education`, `Russian`, `Japanese`, `Technology`) VALUES
(26, 'sean@gmail.com', 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Year` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Salt` text NOT NULL,
  `SubAmount` int(11) NOT NULL,
  `DailyFeedback` int(11) NOT NULL DEFAULT '1',
  `CurrentDate` text NOT NULL,
  `PrevDate` text NOT NULL,
  `CoursesSaved` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Year`, `Email`, `Salt`, `SubAmount`, `DailyFeedback`, `CurrentDate`, `PrevDate`, `CoursesSaved`) VALUES
(26, 'sean', 'd1e72debd219906b7c4b7b96c2645a71929d1705d3c6f209b56bf145bdba5e9af605dd2a0646d70f62b3834cc4398d9c7ea8aa17a10afdae912b86c3f92169b7', 5, 'sean@gmail.com', '3d74a5bde43c19810c7e20bc93bd0369317fb2d3149abad049ecbdafbd4d05a5618beafbc4cb85818f24519f0ff860e65db5b29c9facce3acd439070f4fec076', 6, 1, '', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `visitStats`
--

CREATE TABLE IF NOT EXISTS `visitStats` (
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `LoginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ExploreTime` text NOT NULL,
  `ExploreAmount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitStats`
--

INSERT INTO `visitStats` (`ID`, `Email`, `LoginTime`, `ExploreTime`, `ExploreAmount`) VALUES
(1, 'sean@gmail.com', '2015-05-11 12:10:38', '', 0),
(2, 'sean@gmail.com', '2015-05-11 23:01:51', '', 0),
(3, 'sean@gmail.com', '2015-05-12 15:30:09', '', 0),
(4, 'sean@gmail.com', '2015-05-13 12:06:42', '', 0),
(5, 'sean@gmail.com', '2015-05-14 00:13:43', '', 0),
(6, 'sean@gmail.com', '2015-05-15 12:50:33', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbackPrompts`
--
ALTER TABLE `feedbackPrompts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `interestFeedback`
--
ALTER TABLE `interestFeedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `interestsTable`
--
ALTER TABLE `interestsTable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `savedCourses`
--
ALTER TABLE `savedCourses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `storedInterests`
--
ALTER TABLE `storedInterests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjectFeedback`
--
ALTER TABLE `subjectFeedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjectsTable`
--
ALTER TABLE `subjectsTable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visitStats`
--
ALTER TABLE `visitStats`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbackPrompts`
--
ALTER TABLE `feedbackPrompts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `interestFeedback`
--
ALTER TABLE `interestFeedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `interestsTable`
--
ALTER TABLE `interestsTable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `savedCourses`
--
ALTER TABLE `savedCourses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `storedInterests`
--
ALTER TABLE `storedInterests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subjectFeedback`
--
ALTER TABLE `subjectFeedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subjectsTable`
--
ALTER TABLE `subjectsTable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `visitStats`
--
ALTER TABLE `visitStats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
