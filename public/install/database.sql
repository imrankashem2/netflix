--
-- Table structure for table `ads_management`
--

CREATE TABLE `ads_management` (
  `id` int(11) NOT NULL,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_key` varchar(255) DEFAULT NULL,
  `ad_size` varchar(255) DEFAULT NULL,
  `ad_code` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads_management`
--

INSERT INTO `ads_management` (`id`, `ad_title`, `ad_key`, `ad_size`, `ad_code`, `status`) VALUES
(1, 'Home Top', 'home_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(2, 'Home Bottom', 'home_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(3, 'Movie List Top', 'movie_list_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(4, 'Movie List Bottom', 'movie_list_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(5, 'Movie Single Top', 'movie_single_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(6, 'Movie Single Bottom', 'movie_single_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(7, 'Movie Single Sidebar', 'movie_single_ad_sidebar', '350x250', '<a href=\"#\"><img src=\"https://via.placeholder.com/350x250.png\" alt=\"add_banner\"></a>', 1),
(8, 'Shows List Top', 'shows_list_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(9, 'Shows List Bottom', 'shows_list_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(10, 'Shows Single', 'shows_single_ad', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(11, 'Episode Single Top', 'episode_single_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(12, 'Episode Single Bottom', 'episode_single_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(13, 'Episode Single Sidebar', 'episode_single_ad_sidebar', '350x250', '<a href=\"#\"><img src=\"https://via.placeholder.com/350x250.png\" alt=\"add_banner\"></a>', 1),
(14, 'Language Top', 'language_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(15, 'Language Bottom', 'language_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(16, 'Genres Top', 'genres_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(17, 'Genres Bottom', 'genres_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(18, 'Sports Video Top', 'sports_video_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(19, 'Sports Video Bottom', 'sports_video_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(20, 'Sports Single Top', 'sports_single_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 0),
(21, 'Sports Single Bottom', 'sports_single_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 0),
(22, 'Sports Single Sidebar', 'sports_single_ad_sidebar', '350x250', '<a href=\"#\"><img src=\"https://via.placeholder.com/350x250.png\" alt=\"add_banner\"></a>', 0),
(23, 'Live TV List Top', 'livetv_list_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(24, 'Live TV List Bottom', 'livetv_list_ad_bottom', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(25, 'Live TV Single Top', 'livetv_single_ad_top', '728x90', '<a href=\"#\"><img src=\"https://via.placeholder.com/728x90.png\" alt=\"add_banner\"></a>', 1),
(26, 'Live TV Single Bottom', 'livetv_single_ad_bottom', '728x90', NULL, 1),
(27, 'Live TV Single Sidebar', 'livetv_single_ad_sidebar', '350x250', '<a href=\"#\"><img src=\"https://via.placeholder.com/350x250.png\" alt=\"add_banner\"></a>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `channels_list`
--

CREATE TABLE `channels_list` (
  `id` int(11) NOT NULL,
  `channel_cat_id` int(11) NOT NULL,
  `channel_access` varchar(255) NOT NULL DEFAULT 'Paid',
  `channel_name` varchar(255) NOT NULL,
  `channel_slug` varchar(255) NOT NULL,
  `channel_description` text,
  `channel_thumb` varchar(255) NOT NULL,
  `channel_url_type` varchar(255) NOT NULL,
  `channel_url` varchar(500) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channels_list`
--

INSERT INTO `channels_list` (`id`, `channel_cat_id`, `channel_access`, `channel_name`, `channel_slug`, `channel_description`, `channel_thumb`, `channel_url_type`, `channel_url`, `seo_title`, `seo_description`, `seo_keyword`, `status`) VALUES
(1, 2, 'Free', 'NDTV (m3u8)', 'ndtv-m3u8', '<p>About Us: NDTV is one of the leaders in the production and broadcasting of un-biased and comprehensive news and entertainment programmes in India and abroad. NDTV delivers reliable information across all platforms: TV, Internet and Mobile.</p>\r\n<p><span style=\\\"color: #030303; font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: #f9f9f9;\\\">&nbsp;</span></p>', 'N-NDTV.png', 'hls', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', 'NDTV', 'NDTV is one of the leaders in the production and broadcasting of un-biased and comprehensive news and entertainment programmes in India and abroad.', 'NDTV, news, entertainment', 1),
(2, 2, 'Paid', 'ABP News (Embed)', 'abp-news-embed', '<p>Live TVABP News à¤à¤• à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤šà¥ˆà¤¨à¤² à¤¹à¥ˆ à¤œà¥‹ à¤¨à¤µà¥€à¤¨à¤¤à¤® à¤¶à¥€à¤°à¥à¤· à¤¸à¤®à¤¾à¤šà¤¾à¤°à¥‹à¤‚, à¤–à¥‡à¤², à¤µà¥à¤¯à¤µà¤¸à¤¾à¤¯, à¤®à¤¨à¥‹à¤°à¤‚à¤œà¤¨, à¤°à¤¾à¤œà¤¨à¥€à¤¤à¤¿ à¤”à¤° à¤•à¤ˆ à¤”à¤° à¤…à¤¨à¥à¤¯ à¤•à¤µà¤°à¥‡à¤œ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆà¥¤ à¤¯à¤¹ à¤šà¥ˆà¤¨à¤² à¤®à¥à¤–à¥à¤¯ à¤°à¥‚à¤ª à¤¸à¥‡ à¤­à¤¾à¤°à¤¤ à¤•à¥‡ à¤µà¤¿à¤­à¤¿à¤¨à¥à¤¨ à¤¹à¤¿à¤¸à¥à¤¸à¥‹à¤‚ à¤¸à¥‡ à¤¨à¤µà¥€à¤¨à¤¤à¤® à¤¸à¤®à¤¾à¤šà¤¾à¤°à¥‹à¤‚ à¤•à¤¾ à¤µà¤¿à¤¸à¥à¤¤à¥ƒà¤¤ à¤µà¤¿à¤µà¤°à¤£ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆà¥¤<br /><br />ABP News is a news hub which provides you with the comprehensive up-to-date news coverage from all over India and World. Get the latest top stories, current affairs, sports, business, entertainment, politics, astrology, spirituality, and many more here only on ABP News. ABP News is a popular Hindi News Channel made its debut as STAR News in March 2004 and was rebranded to ABP News from 1st June 2012.</p>', 'N_ABP.jpg', 'embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/3B1CeiC_1LQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ABP News', 'ABP News à¤à¤• à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤šà¥ˆà¤¨à¤² à¤¹à¥ˆ à¤œà¥‹ à¤¨à¤µà¥€à¤¨à¤¤à¤® à¤¶à¥€à¤°à¥à¤· à¤¸à¤®à¤¾à¤šà¤¾à¤°à¥‹à¤‚, à¤–à¥‡à¤², à¤µà¥à¤¯à¤µà¤¸à¤¾à¤¯, à¤®à¤¨à¥‹à¤°à¤‚à¤œà¤¨, à¤°à¤¾à¤œà¤¨à¥€à¤¤à¤¿ à¤”à¤° à¤•à¤ˆ à¤”à¤° à¤…à¤¨à¥à¤¯ à¤•à¤µà¤°à¥‡à¤œ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆà¥¤', 'Live, News, Hindi News', 1),
(3, 2, 'Paid', 'Aaj Tak  (Youtube)', 'aaj-tak-youtube', '<p>Aaj Tak&nbsp;à¤¦à¥‡à¤–à¤¿à¤¯à¥‡ à¤¤à¤¾à¤œà¤¼à¤¾à¤¤à¤°à¥€à¤¨ à¤–à¤¬à¤° à¤¸à¤¿à¤°à¥à¤« News 18 à¤ªà¤° Watch all the current, latest and breaking Hindi news only on NEWS18 India Live TV. The one-stop destination for live Hindi news on politics, entertainment, sports, gadgets, and business.</p>\r\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: 127px; top: -17px;\\\">&nbsp;</div>', 'Sports_Hockey.jpg', 'youtube', 'https://www.youtube.com/watch?v=r7r8zrbOOlk', 'Aaj Tak Live', 'Watch all the current, latest and breaking Hindi news only on NEWS18 India Live TV. The one-stop destination for live Hindi news on politics, entertainment, sports, gadgets, and business.', 'News, current, latest, breaking Hindi news', 1),
(4, 1, 'Free', 'Asianet Live TV', 'asianet-live-tv', '<p>Missing case six year old devananda\\\'s body was found in river Kollam Asianet News Youtube Live delivers breaking and live news alerts, updates and analysis in Malayalam, from Kerala, India and the world on a real time basis. Catch all the latest developments in the political as well as the social sphere of the world around us from a Malayali perspective, almost instantly as it happens there, through Asianet News Live channel. Straight, Bold and Relentless Asianet News is inclined to bring you all sides of a developing story as it emerges. Follow us for all the latest Malayalam News Updates uninterrupted. With the trust of millions of Malayalee viewers across the globe, Asianet News remains the most-watched Malayalam news channel in Kerala.</p>', 'entertainment_1.jpg', 'youtube', 'https://www.youtube.com/watch?v=pGlU2nIVH9U', 'Asianet Live TV', 'Asianet News Youtube Live delivers breaking and live news alerts, updates and analysis in Malayalam, from Kerala, India and the world on a real time basis.', 'entertainment, TV channel', 1),
(5, 1, 'Free', 'Spiritual Mantra', 'spiritual-mantra', '<p>à¥ à¤—à¥ˆà¤¨ à¤—à¤£à¤ªà¤¤à¤¿ à¤§à¥à¤¨ à¤®à¤‚à¤¤à¥à¤° à¤²à¤¿à¤°à¤¿à¤•à¥à¤¸ à¤—à¤£à¥‡à¤¶ à¤¹à¤¿à¤‚à¤¦à¥‚ à¤ªà¥Œà¤°à¤¾à¤£à¤¿à¤• à¤•à¤¥à¤¾à¤“à¤‚ à¤®à¥‡à¤‚ à¤à¤• à¤®à¤¹à¤¤à¥à¤µà¤ªà¥‚à¤°à¥à¤£ à¤¦à¥‡à¤µà¤¤à¤¾ à¤¹à¥ˆ, à¤œà¤¿à¤¸à¥‡ à¤—à¤£à¤ªà¤¤à¤¿ à¤”à¤° à¤µà¤¿à¤¨à¤¾à¤¯à¤• à¤•à¥‡ à¤¨à¤¾à¤® à¤¸à¥‡ à¤­à¥€ à¤œà¤¾à¤¨à¤¾ à¤œà¤¾à¤¤à¤¾ à¤¹à¥ˆà¥¤ à¤µà¤¹ à¤¹à¤¾à¤¥à¥€ à¤•à¥‡ à¤¸à¤¿à¤° à¤µà¤¾à¤²à¤¾ à¤¹à¤¿à¤‚à¤¦à¥‚ à¤­à¤—à¤µà¤¾à¤¨ à¤¹à¥ˆ à¤”à¤° à¤‰à¤¸à¥‡ à¤ªà¥‚à¤œà¤¾ à¤®à¥‡à¤‚ à¤ªà¤¹à¤²à¥€ à¤µà¤°à¥€à¤¯à¤¤à¤¾ à¤®à¤¿à¤²à¥€ à¤¹à¥ˆà¥¤ à¤•à¤¿à¤¸à¥€ à¤­à¥€ à¤¶à¥à¤­ à¤…à¤µà¤¸à¤° à¤•à¥€ à¤¶à¥à¤°à¥à¤†à¤¤ à¤•à¥‡ à¤²à¤¿à¤, à¤‰à¤¸à¥‡ à¤¸à¤¬à¤¸à¥‡ à¤ªà¤¹à¤²à¥‡ à¤ªà¥‚à¤œà¤¾ à¤œà¤¾à¤¤à¤¾ à¤¹à¥ˆà¥¤<br /><br />à¥ à¤—à¤¨ à¤—à¤£à¤ªà¤¤à¤ à¤¨à¤®à¥‹ à¤¨à¤®à¤ƒ à¤¶à¥à¤°à¥€ à¤¸à¤¿à¤¦à¥à¤§à¤¿ à¤µà¤¿à¤¨à¤¾à¤¯à¤• à¤¨à¤®à¥‹ à¤¨à¤®à¤ƒ à¤…à¤·à¥à¤Ÿà¤µà¤¿à¤¨à¤¾à¤¯à¤• à¤¨à¤®à¥‹ à¤¨à¤®à¤ƒ à¤—à¤£à¤ªà¤¤à¤¿ à¤¬à¤¾à¤ªà¥à¤ªà¤¾ à¤®à¥‹à¤°à¤¯à¤¾<br /><br />Om Gan Ganapataye Namo Namah Shree Siddhi Vinayak Namo Namah Ashtavinayak Namo Namah Ganapati Bappa Moraya</p>', 'E_Spiritual Mantra.jpg', 'embed', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/UX1cdPqW5M8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Spiritual Mantra', 'Om Gan Ganapataye Namo Namah Shree Siddhi Vinayak Namo Namah Ashtavinayak Namo Namah Ganapati Bappa Moraya', 'Om Gan Ganapataye Namo, Namah Shree Siddhi Vinayak, Namo Namah Ashtavinayak, Namo Namah, Ganapati Bappa Moraya', 1),
(6, 5, 'Free', 'CafÃ© del Mar', 'cafac-del-mar', '<p>Missing case six year old devananda\\\'s body was found in river Kollam Asianet News Youtube Live delivers breaking and live news alerts, updates and analysis in Malayalam, from Kerala, India and the world on a real time basis. Catch all the latest developments in the political as well as the social sphere of the world around us from a Malayali perspective, almost instantly as it happens there, through Asianet News Live channel. Straight, Bold and Relentless Asianet News is inclined to bring you all sides of a developing story as it emerges. Follow us for all the latest Malayalam News Updates uninterrupted. With the trust of millions of Malayalee viewers across the globe, Asianet News remains the most-watched Malayalam news channel in Kerala.</p>', 'L_CafédelMar.jpg', 'youtube', 'https://www.youtube.com/watch?v=9Auq9mYxFEE', 'CafÃ© del Mar', 'Bloomberg Global News brings you live coverage of the markets open and close, plus everything you need to know across business, finance, technology, politics and more daily.', 'Life, Lifestyle', 1),
(7, 5, 'Paid', 'Life Of Billionaires | Rich Lifestyle Of Billionaires(m3u8))', 'life-of-billionaires-rich-lifestyle-of-billionairesm3u8', '<p>I use affiliate links! These are links where I get a tiny bit of commission from anything purchased through them. This is really helpful for my relationship with brands and gives me a few pennies but doesn\\\'t cost anymore to the customer. As Always, My opinion is always my honest opinion. Thank you so much if you use my links.</p>', 'L_LifeOfBillionaires.jpg', 'hls', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', 'Life Of Billionaires', 'When something is important enough, you do it even if odds are not in your favor.', 'Life Of Billionaires, Rich Lifestyle', 1),
(8, 3, 'Free', 'Relaxing Sleep Music 24/7, Sleep Therapy, Insomnia, Meditation, Spa, Calm Music, Yoga, Study, Sleep', 'relaxing-sleep-music-247-sleep-therapy-insomnia-meditation-spa-calm-music-yoga-study-sleep', '<p>Relaxing Sleep Music 24/7, Sleep Therapy, Insomnia, Meditation, Spa, Calm Music, Yoga, Study, Sleep - Are you looking for relaxation music and sleeping music? Body Mind Zone&rsquo;s relaxing sleep music is specially created to help you fall asleep fast, beat insomnia and encourage lucid dreams. We have a range of relaxing music for sleep therapy and lucid dreams that will help you relax and inspire a good night&rsquo;s sleep and a state of zen. Our relaxing sleep music is beneficial, whether you want peaceful music for a power nap or calming music as sleep meditation music. Body Mind Zone&rsquo;s sleep relaxation music is music to help you relax and sleep. To fall asleep fast, our music for insomnia with its embedded delta waves is essential deep sleep music for insomnia and great sleep therapy. Feeling sleepy and in need of some calm music or deep sleep music? If you can&rsquo;t sleep, use this sleeping music in the background as relaxing music and soothing music or as sleep meditation music after a busy day at work or long hours of study. Our beautiful deep sleep music is soft music, ideal as stress relief music. This relaxing music can also be used for sleep therapy in a spa as spa music and many people find it useful as study music or work music to help them study. This calm music is effective as sleep music, deep sleep music, study music, spa music, relaxing meditation music for meditation and as yoga music. Want to achieve zen? Use our relaxing music for meditation and yoga. Can&rsquo;t Sleep? Use this music for sleeping as soothing relaxation to help you relax and get a great night&rsquo;s sleep, allowing you to say goodbye to insomnia and enjoy the benefits of lucid dreams.</p>\r\n<p><span style=\\\"color: #030303; font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: #f9f9f9;\\\">&nbsp;</span></p>', 'M_BodyMindZone.jpg', 'youtube', 'https://www.youtube.com/watch?v=W3va8mK0Vv8', 'Body Mind Zone', 'Relaxing Sleep Music 24/7, Sleep Therapy, Insomnia, Meditation, Spa, Calm Music, Yoga, Study, Sleep - Are you looking for relaxation music and sleeping music.', 'Relaxing Sleep Music 24/7, Sleep Therapy, Insomnia, Meditation, Spa, Calm Music, Yoga, Study, Sleep', 1),
(9, 3, 'Paid', 'Whole Body Regeneration Sleep Meditation Music - 963 Hz Frequency Of Gods, HEALING FREQUENCIES', 'whole-body-regeneration-sleep-meditation-music-963-hz-frequency-of-gods-healing-frequencies', '<p>Dear spirit, we welcome you to listen to this powerful healing meditation music. Let us help you experience complete healing in your body by asking you to focus on thoughts of health, positivity, and abundance. We ask you to let go of any thought related to disease or physical dysfunction. As you take this time to de-stress by inviting feelings of joy, imagine every cell in your body functioning in its optimum state. Continue to invite perfect health into your life by being active and using your physical strength to engage in activities that will add more color to your life.<br /><br />This meditation healing music has 963 Hz Solfeggio Frequency<br /><br />The 963 Hz solfeggio frequency is the most direct way of reestablishing your relationship to the Source and Devine also called Christ awareness which is an absolute love. This means, love with no retribution of self or others, for we\\\'re all from a same Source. It is related to Sahasrara or crown chakra.<br /><br /></p>\r\n<p><span style=\\\"color: #030303; font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: #f9f9f9;\\\">&nbsp;</span></p>', 'M_SUPERNATURALBRAINWAVEPOWER.jpg', 'youtube', 'https://www.youtube.com/watch?v=s5lxyOQKRaw', 'Whole Body Regeneration Sleep Meditation Music', 'Dear spirit, we welcome you to listen to this powerful healing meditation music.', 'mental and physical conditions, diseases, illnesses', 1),
(10, 4, 'Free', 'قناة الشارقة الرياضية', 'kna-alshark-alryady', '<p>For an epidemic caused by a new strain of coronavirus (2019-nCoV) Coronavirus, also called corona virus, is a group of viruses of the Coronavirinae subfamily in the Coronaviridae family, according to the Nidovirales Ministry. Coronavirus causes disease in mammals, including humans and birds. In humans, the virus that causes respiratory infections is usually mild but in rare cases can be fatal. Coronavirus is a enveloped virus with a positive single-stranded RNA genome and with a spiral symmetrical nucleocapsid. The coronavirus genome size ranges from 26 to 32 kilo base pair, the largest for RNA viruses.</p>', 'S_SharjahSportsTV.jpg', 'hls', 'http://qthttp.apple.com.edgesuite.net/1010qwoeiuryfg/sl.m3u8', 'Sharjah Sports TV', 'Coronavirus is a enveloped virus with a positive single-stranded RNA genome and with a spiral symmetrical nucleocapsid. The coronavirus genome size ranges from 26 to 32 kilo base pair, the largest for RNA viruses.', 'During daytime of China, DXY release updated data sparsely.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_category`
--

CREATE TABLE `channel_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel_category`
--

INSERT INTO `channel_category` (`id`, `category_name`, `category_slug`, `status`) VALUES
(1, 'Entertainment', 'entertainment', 1),
(2, 'News', 'news', 1),
(3, 'Music', 'music', 1),
(4, 'Sports', 'sports', 1),
(5, 'Lifestyle', 'lifestyle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `episode_series_id` int(11) NOT NULL,
  `episode_season_id` int(11) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_votes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `video_access`, `episode_series_id`, `episode_season_id`, `video_title`, `release_date`, `duration`, `video_description`, `video_slug`, `video_image`, `video_type`, `video_url`, `download_enable`, `download_url`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Free', 1, 1, 'S01 E01: Tape 1, Side A', 1490898600, '54m', '<p>Clay Jensen finds a box filled with audio cassette tapes anonymously left on his front doorstep. He plays the first in his father\\\'s boombox and realizes they have been recorded by his recently deceased classmate Hannah Baker before he accidentally drops and breaks the boombox when surprised by his mother. Clay steals his friend Tony\\\'s Walkman to continue listening. Clay listens to the first tape, in which Hannah begins to relate the experiences that led to her suicide. She starts by sharing the story of her first kiss, with Justin Foley, who goes on to inadvertently spread a salacious rumor that begins the sequence of events leading to her suicide. Clay is revealed, through numerous short flashbacks, to have been in love with Hannah and to have worked with her at the local movie theater. It is revealed in this episode that Hannah has put her friend Tony in charge of the tapes.</p>', 's01-e01-tape-1-side-a', '13reasonwhySE01EP01 (2).jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2019-12-16 16:36:26'),
(9, 'Free', 1, 1, 'S01 E02: Tape 1, Side B', 1490898600, '52m', '<p>Hannah reminisces about her friendship with two other new students: Jessica, who moves frequently because her father is in the Air Force, and Alex, whom they met at a coffee shop. Jessica and Alex eventually begin a relationship and stop spending time with Hannah. When Alex breaks up with Jessica, she very publicly blames Hannah. In the present, Hannah\\\'s mother, Olivia, finds a note in her daughter\\\'s textbook that leads her to believe Hannah was being bullied. Clay asks Jessica about the tapes, which results in Bryce Walker\\\'s circle of peers meeting to discuss how Clay is listening to Hannah\\\'s recordings.</p>', 's01-e02-tape-1-side-b', '13reasonwhySE01EP02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/0o5CvkIq8Do?list=PLMHyMvcjXso5xTI9rjn04JX6FzWeLweQy\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:22:33'),
(10, 'Paid', 1, 1, 'S01 E03: Tape 2, Side A', 1490898600, '57m', '<p>As Clay attempts to pursue a romantic relationship with Hannah, her relationships are threatened by a \\\"best/worst list\\\" made by Alex Standall, who has put a \\\"target\\\" on Hannah. In the present, Hannah\\\'s mother, Olivia Baker, seeks out the school principal about her suspicion of bullying and makes a disturbing discovery. In the midst of his investigation, Clay turns to Alex for answers, who not only feels regret for his actions on the tapes, but also warns Clay against trusting Tony, whom Clay later sees in a violent exchange with his brothers. As Justin tries to recuperate from his recent slump, Bryce strong-arms Clay and Alex into a drinking contest in an alleyway.</p>', 's01-e03-tape-2-side-a', '13reasonwhySE01EP03.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/PVWkQBgdCRA?list=PLMHyMvcjXso5xTI9rjn04JX6FzWeLweQy\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:22:18'),
(11, 'Free', 1, 2, 'S02 E01: The First Polaroid', 1526581800, '60m', '<p>Five months after the events of the first season, Hannah\\\'s trial moves to court. Tyler is the first to testify in the trial and does so truthfully. Skye and Clay are dating, but Clay starts to have hallucinations of Hannah. Mr. Porter confronts Bryce in the bathroom about raping Hannah. Jessica returns to school, as does Alex who survived his suicide attempt but has lost much of his memory from before it, including the contents of Hannah\\\'s tapes. Tony is given the note Hannah left him the night she died and is later seen burning it. A Polaroid was left in Clay\\\'s Locker which falls out when he opens it, Clay picks it up, flips it to look at the back and a note saying \\\"Hannah wasn\\\'t the only one\\\".</p>', 's02-e01-the-first-polaroid', '13reasonwhySE02EP01.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2019-12-16 02:33:29'),
(12, 'Free', 1, 2, 'S02 E02: Two Girls Kissing', 1526581800, '60m', '<p>Courtney reveals that she is a lesbian and had feelings for Hannah during her testimony. A group of protesters gathers at the court to demand justice for Hannah, but Jessica and Alex are both threatened to avoid revealing anything incriminating when they testify. Skye and Clay fight over her suspicion that Clay is still in love with Hannah, and Skye is hospitalized soon after leaving Clay\\\'s house. Meanwhile, Tyler befriends a classmate named Cyrus.</p>', 's02-e02-two-girls-kissing', '13reasonwhySE02EP02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/5VtDYd-Aty0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:22:03'),
(13, 'Free', 2, 3, 'S01 E01: Chapter One: The Vanishing of Will Byers', 1468521000, '49m', '<p>In November 1983 in Hawkins, Indiana, a scientist is attacked by an unseen creature at a U.S. Government laboratory. 12-year-old Will Byers encounters the creature and mysteriously vanishes while cycling home from a Dungeons &amp; Dragons session with his friends Mike Wheeler, Dustin Henderson and Lucas Sinclair. Will\\\'s single mother Joyce reports his disappearance to police chief Jim Hopper, who starts a search for Will and assures Joyce that almost all missing children are quickly found. The lab\\\'s director Dr. Martin Brenner investigates an organic substance oozing from the lab\\\'s basement, claiming that \\\"the girl\\\" cannot have gone far. A nervous young girl with a shaved head wearing a hospital gown wanders into a local diner. The owner, Benny, learns from a tattoo on her arm that her name is Eleven. Brenner monitors the phone lines and sends agents to the diner after Benny calls social services. The agents kill Benny, however Eleven manages to escape using telekinetic abilities. Joyce\\\'s phone short circuits after she believes she can hear Will breathing on a phone call. While searching for Will in the woods, Mike, Dustin and Lucas come across Eleven.</p>', 's01-e01-chapter-one-the-vanishing-of-will-byers', 'stangerthingsS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/a22pNanPlSY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:21:35'),
(14, 'Paid', 2, 3, 'S01 E02: Chapter Two: The Weirdo on Maple Street', 1468521000, '56m', '<p>The boys bring Eleven to Mike\\\'s house, where they disagree on how to deal with her. Mike agrees to let her sleep in his basement that night. Will\\\'s brother Jonathan visits his estranged father Lonnie in Indianapolis to search for Will, but Lonnie rebuffs him. Eleven reveals to Mike that \\\"bad people\\\" are looking for her and, after recognizing Will in a photo and demonstrating her telekinesis, convinces the boys to trust her, as they believe that she could help them find Will. Using the Dungeons &amp; Dragons board, Eleven indicates that Will is on the \\\'Upside Down\\\' side of the board and is being hunted by the \\\'<a href=\\\"https://www.youtube.com/watch?v=a22pNanPlSY\\\">Demogorgon</a>\\\' (the creature). Hopper\\\'s search party discovers a scrap of Eleven\\\'s hospital gown near the lab. Mike\\\'s sister Nancy and her friend Barbara \\\'Barb\\\' Holland go to a party with Nancy\\\'s boyfriend Steve Harrington. Searching for Will near Steve\\\'s house, Jonathan secretly takes photographs of the party. Nancy gets drunk and has sex with Steve. Joyce receives another call from Will, hears music playing from his stereo, and sees the creature coming through the wall. Barb, left alone by the swimming pool, is attacked by the Demogorgon and vanishes.</p>', 's01-e02-chapter-two-the-weirdo-on-maple-street', 'stangerthingsS01E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/a22pNanPlSY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:19:54'),
(15, 'Free', 2, 3, 'S01 E03: Chapter Three: Holly, Jolly', 1468521000, '52m', '<p>Barb awakens in the Upside Down: a decaying, overgrown alternate dimension surrounded by a thick mist. Joyce believes that Will is communicating with her through electrical pulses in Christmas lights. Brenner allows Hopper to view doctored security footage from the night that Will vanished, leading Hopper to research the lab\\\'s history and discover that a woman named Terry Ives alleged years earlier that her daughter was taken by Brenner. Eleven recalls memories in which Brenner, whom she calls \\\"Papa\\\", put her in solitary confinement for refusing to telekinetically harm a cat. Steve destroys Jonathan\\\'s camera after discovering the photos from the party; however, Nancy later recovers a photo of Barb, having realized that Barb is missing. Returning to Steve\\\'s house to search for Barb, Nancy sees the Demogorgon but manages to escape. Joyce paints a makeshift Ouija board on her wall, allowing Will to sign to her that he is \\\"RIGHT HERE\\\" and that she needs to \\\"RUN\\\". Believing that Eleven knows where Will is, the boys ask her to lead them to him. Eleven leads them to a quarry, just as Will\\\'s apparent body is found under the water by the search party.</p>', 's01-e03-chapter-three-holly-jolly', 'stangerthingsS01E03.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/nEBOBd3Hrmk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:18:46'),
(16, 'Free', 2, 4, 'S02 E01: Chapter One: MADMAX', 1509042600, '48m', '<p>In October 1984, a psychic girl with a tattoo reading \\\"008\\\" is part of a criminal gang in Pittsburgh, Pennsylvania. In Hawkins, the town prepares for Halloween. A new girl at school, Maxine \\\"Max\\\" Mayfield, captures the boys\\\' attention. Joyce is dating her old high school classmate Bob Newby, Hopper investigates a field of pumpkins mysteriously rotting, and conspiracy theorist Murray Bauman investigates people who sighted Eleven, believing her to be a Russian spy. Mike and Nancy deal with their respective losses of Eleven and Barb, and Will has been experiencing episodes of apparent hallucinations of the Upside Down and an enormous, tentacled shadow monster. Joyce and Hopper take Will to see the lab\\\'s new director Dr. Sam Owens, who has been giving Will routine medical exams ever since his return. Owens theorizes that Will\\\'s episodes are PTSD brought on by the anniversary of his disappearance. The gate in the lab\\\'s basement has been growing, worrying Owens. Nancy and Steve have dinner with Barb\\\'s parents, who still believe that their daughter to be missing and who have hired Murray to find her. Hopper goes home to a cabin in the woods where he secretly lives with Eleven.</p>', 's02-e01-chapter-one-madmax', 'stangerthingsS02E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/zIJzq3E1Yvk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:18:34'),
(17, 'Paid', 2, 4, 'S02 E02: Chapter Two: Trick or Treat, Freak', 1509042600, '56m', '<p>Flashbacks reveal that Eleven escaped from the Upside Down but was forced to hide from agents. In the present, it is Halloween. Eleven asks Hopper if she can go trick-or-treating, but Hopper insists that she needs to remain hidden until he can reach an agreement with Owens allowing her to live a normal life, frustrating the homebound Eleven. More pumpkin fields rot across town and Hopper discovers an organic substance &ndash; similar to the substance in the lab &ndash; in the fields. Nancy wants to tell Barb\\\'s parents the truth about her death, but Steve says it is a bad idea, as the agents might come after them if they told anyone the truth. Instead, they attend a Halloween party, where Nancy gets drunk and berates Steve for his lack of empathy for Barb\\\'s parents. Steve leaves and Jonathan takes Nancy home. The boys go trick-or-treating and are later joined by Max. During the night, Will has another episode and tells Mike about his visions, leading Mike to admit that he is trying to contact Eleven. Eleven tries to contact Mike using her powers but is unsuccessful. Dustin returns home after trick-or-treating and finds a strange creature in his trash can.</p>', 's02-e02-chapter-two-trick-or-treat-freak', 'stangerthingsS02E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/9FSoUgusNzc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:18:20'),
(18, 'Free', 3, 6, 'S01 E01: Chapter 1', 1359657000, '57m', '<p>Francis \\\"<strong>Frank</strong>\\\" Underwood is an ambitious Democratic congressman and the House Majority Whip. Frank helped ensure the election of President Garrett Walker, who promised to appoint him as Secretary of State. However, before Walker is sworn in, Chief of Staff Linda Vasquez announces that Walker will instead nominate Senator Michael Kern. Linda informs Frank that their administration requires his help from within the House of Representatives, starting with working on an education reform bill with Representative Donald Blythe. Furious at Walker\\\'s betrayal, Frank and his wife Claire (an environmental activist) make a pact to destroy Walker, starting with Kern. Frank starts seeking out pawns in his war against Walker. When the troubled Representative Peter Russo (who has a history of drug and alcohol abuse) is arrested for driving drunk with Rachel Posner, a prostitute, in the car with him, Frank offers him a reprieve in exchange for his loyalty, covering up the incident by bribing the police commissioner. Frank also encounters Zoe Barnes, a young political reporter for the Washington Herald newspaper. The two come to an agreement in which Frank will leak inside information to incriminate his political opponents, while Zoe advances her career by publishing it. Frank leaks a copy of the first draft of Donald Blythe\\\'s education bill, which proposes massive increases in government control of education, promptly causing a scandal the very first day after the Presidential inauguration.</p>', 's01-e01-chapter-1', 'HouseofcardsS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/w_J9ioyUcVI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:18:08'),
(19, 'Paid', 3, 6, 'S01 E02: Chapter 2', 1359657000, '50m', '<p>In the aftermath of the leak of the education bill draft, Frank secures full control of the legislative course from the President and promptly removes Donald, who graciously takes the fall for the published controversy. Frank hires a team of young congressional staffers to write a draft of the bill in a week (a process which would usually take months). Claire, at her environmental company, is forced to lay off more than half of the staff at her NPO (Clean Water Initiative) after a donation which was contingent on Frank being appointed Secretary of State is withdrawn. Via Zoe, Frank plants a story that loosely ties SoS-nominee Michael Kern to an anti-Israeli editorial column that ran in his college newspaper while Kern was editor. Kern mishandles the resulting media scrutiny. Frank forcefully arranges for Peter Russo to meet a conspiracy junkie, Roy Kapeniak, who wrote for that college newspaper, and convince him to go on the record and state that Kern himself wrote the article, which destroys Kern\\\'s candidacy chances. Frank then tosses Catherine Durant\\\'s name to Zoe as a likely replacement before reinforcing her credentials with Linda Vasquez.</p>', 's01-e02-chapter-2', 'HouseofcardsS01E02 (2).png', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/PVWkQBgdCRA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:17:50'),
(20, 'Free', 3, 6, 'S01 E03: Chapter 3', 1359657000, '51m', '<p>In the midst of negotiating the education bill\\\'s reforms with the teachers\\\' unions, Frank must visit his hometown of Gaffney, South Carolina when his main local opponent stirs trouble. A young woman has been killed in a car accident after texting while driving, apparently distracted by a peach water tower which Frank had advocated to keep standing. (The tower is provocatively similar to the female bottom, which was the subject of the driver\\\'s text.) His rival encourages the parents to sue, forcing Frank into a difficult negotiation. Claire meets and hires a hesitant Gillian Cole, an activist for WorldWell (another environmental water NPO), to employ her international expertise. Peter Russo makes an effort to clean up his life, in order to maintain his relationship with his girlfriend, Christina Gallagher, who is also his chief of staff. Zoe gets into trouble for talking on national TV about the Herald and her editor, Tom Hammerschmidt, after being told not to.</p>', 's01-e03-chapter-3', 'HouseofcardsS01E03.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/PgBnU92XTpU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:17:41'),
(21, 'Paid', 3, 6, 'S01 E04: Chapter 4', 1359657000, '49m', '<p>Frank resorts to intricate political string-pulling when House Speaker Bob Birch refuses to support the education bill with its controversial amendments. Frank organizes a coup against Birch using the majority leader David Rasmussen, in order to pressure Birch to cooperate. Frank ensures Representative Terry Womack\\\'s support for the coup by forcing Peter Russo to allow a shipyard in his district to close in order to keep a military base in Womack\\\'s district open. Birch relents, and Womack replaces Rasmussen as majority leader. Tom Hammerschmidt is exasperated with Zoe\\\'s rebelliousness but the Herald\\\'s publisher supports her. Tom offers Zoe the position of White House correspondent and she indicates acceptance, but Frank convinces her to decline it, which further antagonizes Hammerschmidt. Remy Danton, a lobbyist and former employee of Frank\\\'s, offers Claire double the donation previously promised to CWI, which would allow them to hire back the staff they laid off, but Frank pressures Claire to refuse it, fearing Remy\\\'s motives. Claire meets with photographer Adam Galloway, a former lover who tries to rekindle their relationship. Zoe invites Frank to her apartment for an intimate encounter.</p>', 's01-e04-chapter-4', 'HouseofcardsS01E04.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2019-12-17 16:51:45'),
(22, 'Free', 3, 7, 'S02 E01: Chapter 14', 1392316200, '50m', '<p>Newly selected Vice President Frank Underwood\\\'s chief of staff Doug Stamper warns him about journalists investigating the death of Congressman Peter Russo. When Zoe suggests Russo was murdered, Frank pushes her in front of an oncoming Metro train. Zoe\\\'s colleague Janine Skorsky receives nude photos of Zoe that Frank had taken, and is frightened into abandoning the investigation; Zoe\\\'s lover, editor Lucas Goodwin, refuses to desist. Doug forcibly relocates the prostitute Rachel Posner, who was involved in Russo\\\'s covered-up DUI and eventual downfall, and is now afraid of the consequences. Frank makes a new ally in Jacqueline Sharp, a former war hero, as his choice to replace him as House Majority Whip, and suggests an open race within the House to allow Jackie to compete against the expected candidates. Claire leverages her former employee Gillian Cole\\\'s expected lawsuit by fraudulently excluding vital medication for her unborn child from her health insurance, and then offers her total control of the Clean Water Initiative as a purported peace offering.</p>', 's02-e01-chapter-14', 'HouseofcardsS02E01.png', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/0o5CvkIq8Do\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:17:19'),
(23, 'Free', 3, 7, 'S02 E02: Chapter 15', 1392316200, '49m', '<p>Frank is sworn in as Vice President and declines to move into the Naval Observatory. The Secret Service renovates his town-house with required security features. Frank uses Secretary of State Catherine Durant\\\'s team to stall a trade meeting with China, in order to loosen billionaire Raymond Tusk\\\'s influence on President Walker. Frank convinces Walker to stand tough against China\\\'s indignant withdrawal, resulting in China cutting off further trade talks with the U.S. Jackie strengthens her race for House Majority Whip, eventually destroying her mentor\\\'s career in order to secure the position. At his first formal engagement as Vice President, a military awards ceremony, Claire tells Frank the newly-commissioned General Dalton McGinnis is her college rapist. Lucas looks for a hacker on the deep web to access Frank\\\'s phone records and connect him to the deaths of Russo and Zoe.</p>', 's02-e02-chapter-15', 'HouseofcardsS02E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/Ljo_bHAcg4k\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:17:07'),
(24, 'Paid', 3, 7, 'S02 E03: Chapter 16', 1392316200, '52m', '<p>As Walker crafts his State of the Union address, Tusk reluctantly agrees to postpone resumption of trade negotiations with China, while Frank negotiates a bipartisan agreement with Senate Majority Leader Hector Mendoza on a compromise over reform of public entitlements to avoid a government shutdown. Senate Republicans renege on the agreement, then attempt to avoid a quorum and then filibuster, but Frank thwarts both moves and secures passage of the bill. Doug requests his FBI contact to run a sting operation on Lucas, who is contacted by a hacker Gavin Orsay, claiming to be able to retrieve Zoe\\\'s phone records. Rachel contacts her mother and reaches out to a religious stranger, Lisa Williams, despite Doug\\\'s instruction to speak to no one.</p>', 's02-e03-chapter-16', 'HouseofcardsS02E03.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/2eFe9j_FO20\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:16:55'),
(25, 'Free', 3, 8, 'S03 E01: Chapter 27', 1424975400, '59m', '<p>President Frank Underwood visits his father\\\'s grave in rural South Carolina to maintain a public appearance of respect, only to privately urinate on it out of spite. Doug Stamper is found beaten in the woods and requires extensive surgery and care; he makes a slow and painful recovery. Remy Danton has been filling in as Underwood\\\'s White House Chief of Staff. Frank also enlists Donald Blythe as his Vice President. In an effort to show some form of progress by his administration, Frank pushes for a jobs program called America Works* (or \\\"AmWorks\\\"). Gavin Orsay has accepted working for the FBI despite not wanting to work for the people who had been oppressing him. Doug asks for his help in locating Rachel Posner, who is still missing after assaulting Stamper and stealing his car. Meanwhile, First Lady Claire Underwood has set her sights on becoming the United States Ambassador to the United Nations. Frank orders a drone airstrike that successfully takes out a foreign target. Doug finally gives in to the pain from his injuries and has a prostitute squirt bourbon into his mouth from a syringe, thus breaking his sobriety.</p>', 's03-e01-chapter-27', 'HouseofcardsS03E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/4oAg8LMQBU0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:16:43'),
(26, 'Paid', 3, 8, 'S03 E02: Chapter 28', 1424975400, '55m', '<p>During Claire\\\'s nomination hearing before a Senate committee, she makes a casual comment which escalates into a heated argument that leaves the committee with the impression that Claire is hot-headed and thus not fit to be UN Ambassador. Frank meets with the Democratic leadership to discuss America Works, only to be told that they do not want him running for president in 2016. Remy, on behalf of Frank, asks House Majority Whip Jackie Sharp to give information about any talk regarding who will run on the Democratic ticket. In return, Jackie wants to be Frank\\\'s running mate when he runs in 2016. Frank and Claire make several calls: Frank to get potential financial contributors for his 2016 campaign; Claire to senators to sway their vote on her nomination. Both are unsuccessful. The next day, the Senate votes against Claire\\\'s nomination. Frank meets with the Democratic leadership and proposes that in return for not running in 2016, they will help Frank pass America Works. Frank finally gives more details of America Works, falsely stating that he does not intend to run for office in 2016. Claire decides to challenge her rejected nomination and asks for a recess appointment, to which Frank agrees.</p>', 's03-e02-chapter-28', 'HouseofcardsS03E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/IWjRYlJQxHo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:16:29'),
(27, 'Free', 5, 12, 'S01 E01: Jhandu', 1542306600, '53m', '<p>Munna Tripathi, son of powerful Akhandanand Tripathi known as Kaleen Bhaiyaa mistakenly shoots a groom while dancing. The groom\\\'s family takes the case to honest lawyer, Mr Pandit. Pandit has 3 children, Guddu, Bablu and Dimpy, all three study in the same college. Dimpy\\\'s close friend Sweety likes Guddu. When Munna gets to know about Pandit taking the case, he goes to Pandit\\\'s house to threaten him. When he refuses to comply, Munna points a gun at him. This leads to a fight where Guddu beats up Munna badly. Munna feels insulted and Tripathi calls the Pandit brothers to his place. The brothers get shocked when Tripathi offers them to work with him. Aside from this, Beena is the second wife of Akhandanad Tripathi but is not happy with her sex life.</p>', 's01-e01-jhandu', 'MirzapurS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/IWjRYlJQxHo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 'http://videostreaming.viavilab.com/upload/source/dolbycanyon_MP4.mp4', NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-12 23:35:39'),
(28, 'Paid', 5, 12, 'S01 E02: Gooda', 1542306600, '45m', '<p><a href=\\\"https://www.youtube.com/watch?v=IWjRYlJQxHo\\\">The brothers</a> agree to work for Tripathi. They are given a bike and are sent to talk their father out of the case. Munna is angry with his father for not punishing Guddu and Bablu. Pandit refuses to listen to his sons and asks them to leave. It is revealed that Sweety has a nerdy sister, Golu, and that their father is a corrupt cop who takes bribes from Tripathi. Munna is interested in Sweety, who refuses him constanly. Guddu and Bablu force the dead groom\\\'s father to withdraw the case. Rati Shankar, an old rival of Tripathi, sends a man to kill Munna. Munna survives and kills the man.</p>', 's01-e02-gooda', 'MirzapurS01E02.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', 1, '#', NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-12 23:39:19'),
(29, 'Free', 4, 10, 'S01 E01: Ashwathama', 1530815400, '51m', '<p>Gangster Ganesh Gaitonde calls Inspector Sartaj Singh and tips him off about something destructive that will happen in Mumbai in the next 25 days. He then shoots himself before getting caught.</p>\r\n<p>A mysterious phone call from an anonymous man leads police officer Sartaj Singh on a chase around Mumbai in a dangerous cat-and-mouse game.</p>', 's01-e01-ashwathama', 'scaredgamesS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/miuLcjnRzT0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, '#', NULL, '8.9', NULL, 'Ashwathama', 'Gangster Ganesh Gaitonde calls Inspector Sartaj Singh and tips him off about something destructive that will happen in Mumbai in the next 25 days. He then shoots himself before getting caught.', 'Sacred Games, Ashwathamam,Gangster', 1, NULL, '2020-03-10 22:15:57'),
(30, 'Paid', 4, 10, 'S01 E02: Halahala', 1530815400, '50m', '<p>The death of <a href=\\\"https://www.youtube.com/watch?v=miuLcjnRzT0\\\">Gaitonde</a> puts the Mumbai police on high alert, while Singh is suspended by his senior due to conflict.</p>\r\n<p>News of Ganesh Gaitonde creates a stir among Mumbai\\\'s VIPs, from politicians to film stars. Removed from the case, Sartaj begins his own investigation.</p>', 's01-e02-halahala', 'scaredgamesS01E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/GEZ4bJrG0Wo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:15:43'),
(31, 'Free', 4, 11, 'S02 E01: Matsya', 1565807400, '56m', '<p>After making a discovery in <a href=\\\"https://www.youtube.com/watch?v=GEZ4bJrG0Wo\\\">Gaitonde\\\'s</a> bunker, Sartaj joins a mission to foil a deadly conspiracy. In 1994, Gaitonde resurfaces in a new location.</p>\r\n<p>Sartaj continues to uncover a conspiracy. In 1994, Gaitonde resurfaces in Kenya to work for RAW.</p>', 's02-e01-matsya', 'scaredgamesS02E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/vts6pPzF0FI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:15:28'),
(32, 'Paid', 4, 11, 'S02 E02: Siduri', 1565807400, '49m', '<p>Sartaj visits Guruji&rsquo;s ashram to find the answers. In the late 1990s, Gaitonde meets Guruji while expanding his business in the country.</p>\r\n<p>With the terrorist-cell investigation underway, Sartaj visits Guruji&rsquo;s ashram. In the late \\\'90s, Gaitonde is urged to seek a spiritual anchor.</p>', 's02-e02-siduri', 'scaredgamesS02E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/YnNbqSRffQw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:15:16'),
(33, 'Free', 6, 13, 'S01 E01: The Family Man', 1568917800, '53m', '<p>The Indian Coast Guard captures three ISIS terrorists in Arabian Sea near Kochi. Force One is tasked to handle the transportation of these personnel under TASC supervision. Meanwhile Drithi, daughter of Srikanth (Manoj) who works for TASC, is on the brink of suspension from school for her activities. The ISIS personnel tries to escape in Mumbai which results in a shooting by Force One. Srikant convinces Moosa, one of the ISIS operatives to surrender. Meanwhile in Pakistan, Major Sameer is planning a mission in India to force India into taking military action. One of the ISIS militant plants a scooter bomb and is considered by Sameer for the Mission Zulfiqar.</p>', 's01-e01-the-family-man', 'TheFamilymenS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/lWGbS0UwKw8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:15:02'),
(34, 'Free', 6, 13, 'S01 E02: Sleepers', 1568917800, '47m', '<p>The bomb planted by ISIS militants in the scooter near Black Horse (Kaala Goda) statue explodes even after the security forces try to defuse it. Pressure increases to find bomber. Chief analysts of T.A.S.C receive information about three gaming engineers who are linked with ISIS. Srikant Tiwari plans to arrest them. After arresting them at their company, on interrogation they mention a dropbox and strongly suspect it\\\'s a student in Victoria College but they reveal that they have never met him face to face.</p>', 's01-e02-sleepers', 'TheFamilymenS01E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/PVWkQBgdCRA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:14:47'),
(35, 'Free', 7, 15, 'S01 E01: Momento De DecisiÃ³n (The Decision)', 1489948200, '39m', '<p>Emilia Urquiza, the First Lady of Mexico, has filed for divorce from her husband, Diego Nava, the President of Mexico. Nava confronts Emilia in her suite at a hotel in Mexico City. The pair argues, which sees Nava attack Emilia. Emilia flees to the balcony and attempts to run past Nava, but she knocks herself out while doing so. When she awakes, Nava has fallen over the balcony and landed on his vehicle. She also finds she is holding her pistol, which she did not have with her on the balcony. Down below, Nava is pronounced dead. Believing Emilia to have murdered Nava, Mexican secret service enters the suite, but Emilia escapes, fleeing the scene. A manhunt is then launched while Jos&eacute; Barquet, Secretary of the Interior, is sworn in as President.</p>', 's01-e01-momento-de-decision-the-decision', 'IngobernableS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/4N7Q4Jnz5Mc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:14:34'),
(36, 'Paid', 7, 15, 'S01 E02: La Huida (The Getaway)', 1490293800, '41m', '<p>Emilia must take extreme measures to remain hidden as Mexican government forces intensify their search for her.</p>', 's01-e02-la-huida-the-getaway', 'IngobernableS01E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/YPn4tXT7ZDM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:14:18'),
(37, 'Free', 8, 14, 'S01 E01: Els PeripatÃ¨tics', 1442169000, '58m', '<p>Merli Bergeron is a middle-aged philosophy professor who loses his apartment just as his ex-wife takes a job in Rome. He accepts the responsibility to raise their teenage son while moving them into his mother\\\'s apartment in Barcelona. A job opens at his son Bruno\\\'s school. Happy to be employed, he immediately disrupts the order among his colleagues and sparks discussion in his classroom, much to Bruno\\\'s chagrin. Each episode focuses on a particular philosopher and their ideas. Merli demonstrates Aristotle\\\'s Peripatetics (the act of movement to bring forth robust ideas...</p>', 's01-e01-els-peripatetics', 'MerliS01E01.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/YPn4tXT7ZDM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:14:05'),
(38, 'Paid', 8, 14, 'S01 E02: PlatÃ³', 1442773800, '58min', '<p><a href=\\\"https://www.youtube.com/watch?v=sgcdood2wxo\\\">His students</a>, whom he dubs \\\"peripatetics\\\", are a very diverse group that must face all kinds of situations: Pol, a repeater that soon gets along with Merl&iacute;; Berta, a student who does not like Merl&iacute; at first; Marc, a friendly, nice guy; Ivan, a boy who suffers from agoraphobia and does not dare to leave home; T&agrave;nia, an extroverted girl and Bruno\\\'s best friend; Gerard, a boy who is prone to fall in love and will ask Merl&iacute; for advice; Joan, a studious, shy boy with a very strict family; M&ograve;nica, a new, very mature student; Oliver, another new boy; and finally, Bruno, Merl&iacute;\\\'s son and his most difficult student.<br /><br />Merli Bergeron is a middle-aged philosophy professor who loses his apartment just as his ex-wife takes a job in Rome. He accepts the responsibility to raise their teenage son while moving them into his mother\\\'s apartment in Barcelona. A job opens at his son Bruno\\\'s school. Happy to be employed, he immediately disrupts the order among his colleagues and sparks discussion in his classroom, much to Bruno\\\'s chagrin. Each episode focuses on a particular philosopher and their ideas. Merli demonstrates Aristotle\\\'s Peripatetics (the act of movement to bring forth robust ideas...</p>\r\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: 212px; top: 155px;\\\">&nbsp;</div>', 's01-e02-plato', 'MerliS01E02.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/sgcdood2wxo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, NULL, '7.5', NULL, 'S01 E02: PlatÃ³', 'Merli Bergeron is a middle-aged philosophy professor who loses his apartment just as his ex-wife takes a job in Rome.', 'Merli, Bergeron', 1, NULL, '2020-03-10 22:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genres_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `genre_slug`, `genres_image`, `status`) VALUES
(1, 'Drama', 'drama', 'drama.png', 1),
(2, 'Action', 'action', 'action-movie.png', 1),
(3, 'Comedy', 'comedy', NULL, 1),
(5, 'Thriller', 'thriller', NULL, 1),
(6, 'Horror', 'horror', '960x0.png', 1),
(8, 'Romance', 'romance', '689090-relationship-02-thinkstock.png', 1),
(9, 'Adventure', 'adventure', NULL, 1),
(10, 'Sci-Fi', 'sci-fi', NULL, 1),
(11, 'Fantasy', 'fantasy', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_section`
--

CREATE TABLE `home_section` (
  `id` int(11) NOT NULL,
  `section1_latest_movie` varchar(500) DEFAULT NULL,
  `section2_latest_series` varchar(500) DEFAULT NULL,
  `section3_popular_movie` varchar(500) DEFAULT NULL,
  `section3_popular_series` varchar(500) DEFAULT NULL,
  `section3_title` varchar(500) DEFAULT NULL,
  `section3_type` varchar(255) NOT NULL,
  `section3_lang` int(11) DEFAULT NULL,
  `section4_title` varchar(255) DEFAULT NULL,
  `section4_type` varchar(255) NOT NULL,
  `section4_lang` int(11) DEFAULT NULL,
  `section5_title` varchar(255) DEFAULT NULL,
  `section5_type` varchar(255) NOT NULL,
  `section5_lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_section`
--

INSERT INTO `home_section` (`id`, `section1_latest_movie`, `section2_latest_series`, `section3_popular_movie`, `section3_popular_series`, `section3_title`, `section3_type`, `section3_lang`, `section4_title`, `section4_type`, `section4_lang`, `section5_title`, `section5_type`, `section5_lang`) VALUES
(1, '23,21,19,17,16,15,10,9', '5,4,3,1', '23,21,19,14,12,11,9', '6,4,2', 'English Movies', 'Movie', 2, 'Hindi Series', 'Series', 1, 'Hindi Movies', 'Movie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(60) NOT NULL,
  `language_slug` varchar(255) NOT NULL,
  `language_image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `language_slug`, `language_image`, `status`) VALUES
(1, 'Hindi', 'hindi', 'hindixl_070617120630.png', 1),
(2, 'English', 'english', 'eng_cat.png', 1),
(3, 'Spanish', 'spanish', 'colored-painted.jpg', 1),
(4, 'French', 'french', NULL, 1),
(5, 'Arabic', 'arabic', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_videos`
--

CREATE TABLE `movie_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `movie_lang_id` int(11) NOT NULL,
  `movie_genre_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_votes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_videos`
--

INSERT INTO `movie_videos` (`id`, `video_access`, `movie_lang_id`, `movie_genre_id`, `video_title`, `release_date`, `duration`, `video_description`, `video_slug`, `video_image_thumb`, `video_image`, `video_type`, `video_url`, `download_enable`, `download_url`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Free', 1, '2,5', 'WAR', 1569954600, '1h 54m 30s', '<div class=\\\"mod\\\" lang=\\\"en-IN\\\" data-md=\\\"50\\\" data-hveid=\\\"CA0QAA\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQkCkwKHoECA0QAA\\\">\r\n<div class=\\\"PZPZlf hb8SAc\\\" data-attrid=\\\"description\\\" data-hveid=\\\"CA0QAQ\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQziAoADAoegQIDRAB\\\">\r\n<div>\r\n<div class=\\\"kno-rdesc\\\">\r\n<div>An Indian soldier is assigned to eliminate his former mentor and he must keep his wits about him if he is to be successful in his mission. When the two men collide, it results in a barrage of battles and bullets.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\\\"mod\\\" lang=\\\"en-IN\\\" data-md=\\\"30\\\" data-hveid=\\\"CA0QAg\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQ6-0CMCl6BAgNEAI\\\">&nbsp;</div>\r\n<div class=\\\"mod\\\" lang=\\\"en-IN\\\" data-attrid=\\\"kc:/film/film:theatrical region aware release date\\\" data-md=\\\"1001\\\" data-hveid=\\\"CA0QAw\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQkCkwKnoECA0QAw\\\">\r\n<div class=\\\"Z1hOCe\\\">\r\n<div class=\\\"zloOqf PZPZlf\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQyxMoADAqegQIDRAE\\\">Release date: 2 October 2019 (India)<br />Director: Siddharth Anand<br />Budget: 200 crores INR<br />Screenplay: Siddharth Anand, Abbas Tyrewala</div>\r\n</div>\r\n</div>\r\n<div class=\\\"mod\\\" lang=\\\"en-IN\\\" data-attrid=\\\"kc:/film/film:screenplay\\\" data-md=\\\"1001\\\" data-hveid=\\\"CA0QDg\\\" data-ved=\\\"2ahUKEwiU97ewpYDmAhXzX3wKHaqSAFkQkCkwLXoECA0QDg\\\">&nbsp;</div>\r\n<p><br />War is a 2019 Indian Hindi-language action thriller film directed by Siddharth Anand and produced by Aditya Chopra under his banner Yash Raj Films. It stars Hrithik Roshan and Tiger Shroff, and tells the story of an Indian soldier assigned to eliminate his former mentor who has gone rogue.</p>\r\n<p>Principal photography began in the second week of September 2018 and concluded in March 2019. Initially titled Fighters, the film\\\'s title was changed after the release of the official teaser in July 2019. The music was composed by Vishal&ndash;Shekhar, with lyrics written by Kumaar, and released under the banner YRF Music.</p>\r\n<p>War was theatrically released in India in 4DX on 2 October 2019, the occasion of Gandhi Jayanti.[4] The film received mostly positive reviews from critics, with praise for the performances of Roshan and Shroff and the action sequence, but criticism for its predictable storyline. War set the record for the highest-opening day collection for a Bollywood film in India.[5] With a worldwide gross of over â‚¹450 crore, it emerged as a commercial success, and the highest-grossing Indian film of 2019.<br /><br /><br /></p>', 'war', '296058R1.png', '70852958.png', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/8mVUOtUN7-U\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-16 19:42:18'),
(10, 'Free', 1, '2,1,8', 'Kabir Singh', 1561055400, '174 minutes', '<p>Kabir Singh is a 2019 Indian Hindi-language romantic drama film written and directed by Sandeep Vanga. It is a remake of his own Telugu film Arjun Reddy (2017). Jointly produced by Cine1 Studios and T-Series, the film stars Shahid Kapoor and Kiara Advani. It focuses on the title character, an alcoholic surgeon with an explosive temper who goes on a self-destructive path after his girlfriend is forced to marry someone else.</p>\r\n<p>Principal photography began in October 2018 and ended in March 2019. The film was theatrically released in India on 21 June 2019 and received mixed reviews, with criticism directed at it for glamorising misogyny and toxic masculinity, though Kapoor\\\'s performance was praised. At the box office, it became Kapoor\\\'s highest-grossing film.</p>', 'kabir-singh', 'kabir1.jpg', 'kabir2.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/5VtDYd-Aty0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 19:57:46'),
(11, 'Free', 1, '1,8', 'Raanjhanaa', 1371753000, '2h 11m', '<p>An eternal love story that chronicles the journey of Sunder and Zoya, as they travel through the realms of life. When Sunder discovers that Zoya loves someone else, he sacrifices his love.</p>\r\n<p><strong>Release date</strong>: 21 June 2013 (India)<br /><strong>Director</strong>: Aanand L. Rai<br /><strong>Music director</strong>: A. R. Rahman <br /><strong>Written by</strong>: Himanshu Sharma <br /><strong>Edited by</strong> Amitabh Shukla</p>', 'raanjhanaa', 'Raanjhanaa.jpg', 'Raanjhanaa2.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://player.vimeo.com/video/207285869\" frameborder=\"0\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 22:06:37'),
(12, 'Free', 1, '2,3', 'Total Dhamaal', 1550773800, '1h 27m', '<p>Total Dhamaal (also known as Dhamaal 3) is an Indian 2019 Hindi-language adventure comedy film directed, co-produced and written by Indra Kumar. The third installment of the Dhamaal franchise, it is a reboot of the 2007 film Dhamaal, and based loosely on the 1963 Hollywood film It\\\'s a Mad, Mad, Mad, Mad World. Total Dhamaal features an large ensemble cast including Ajay Devgn, Anil Kapoor, Madhuri Dixit, Riteish Deshmukh, Arshad Warsi, Javed Jaffrey, and Esha Gupta. It also stars Sanjay Mishra, Pitobash Tripathy, Boman Irani, Johnny Lever, and Manoj Pahwa in brief roles, with Sonakshi Sinha appearing in a item number \\\"Mungda\\\". The film has been produced on a budget of â‚¹90 crore (US$13 million).</p>\r\n<p>Production of the film began in March 2017. Deshmukh, Warsi and Jaffrey were chosen to be a part of Total Dhamaal too. Meanwhile, Devgn, Kapoor and Dixit were added to the cast as well. Principal photography of Total Dhamaal began in January 2018. Devgn also co-produced the film. Filming concluded in August 2018. The official teaser of the film was unveiled on 19 January 2019, whereas trailer released on 21 January. Due to the Pulwama Attack held on 14 February, the film was not released in Pakistan.</p>\r\n<p>The film was theatrically released on 22 February 2019. It received mixed reviews from critics. The film grossed over â‚¹200 crore (US$29 million) within 12 days of its release. With a worldwide gross of â‚¹228.27 crore (US$33 million), it became one of the highest-grossing Bollywood films of 2019 and one of the highest-grossing Indian films of all time. The film netted â‚¹154 crore (US$22 million) domestically and was termed a Super Hit by Box Office India.</p>', 'total-dhamaal', 'Total Dhamaal.jpg', 'Total Dhamaal2.jpg', 'Local', 'dolbycanyon_MP4.mp4', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2019-11-23 01:02:47'),
(13, 'Free', 2, '6', 'Annabelle Comes Home', 1561487400, '1h 46m', '<p>Determined to keep Annabelle from wreaking more havoc, paranormal investigators Ed and Lorraine Warren lock the possessed doll in the artifacts room in their house. But when the doll awakens the room\\\'s evil spirits, it soon becomes an unholy night of terror for the couple\\\'s 10-year-old daughter, her friends and their young baby sitter.<br /><br /><strong>Initial release</strong>: 26 June 2019 (USA)<br /><strong>Director</strong>: Gary Dauberman<br /><strong>Box office</strong>: 22.86 crores USD<br /><strong>Budget</strong>: $27&ndash;32 million<br /><strong>Production companies</strong>: Atomic Monster Productions, New Line Cinema, The Safran Company</p>', 'annabelle-comes-home', 'annabelle.jpg', 'annabelle1.jpg', 'Local', 'dolbycanyon_mkv.mkv', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(14, 'Paid', 2, '6', 'A Quiet Place', 1522953000, '1h 31m', '<p>A family struggles for survival in a world where most humans have been killed by blind but noise-sensitive creatures. They are forced to communicate in sign language to keep the creatures at bay.</p>\r\n<p><span style=\\\"color: #0000ff;\\\"><strong>Release date:</strong></span> 6 April 2018 (India)<br /><strong>Director:</strong> John Krasinski<br /><strong><span style=\\\"color: #0000ff;\\\"><em>Budget</em></span>:</strong> $17&ndash;21 million<br /><strong>Box office:</strong> 34.09 crores USD<br /><span style=\\\"color: #000000;\\\"><em><strong><span style=\\\"color: #0000ff;\\\">Awards</span>:</strong></em></span> Screen Actors Guild Award for Outstanding Performance by a Female Actor in a Supporting Role, MORE</p>', 'a-quiet-place', 'AQP (1).jpg', 'AQP2.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2019-11-24 23:05:33'),
(15, 'Free', 2, '2', 'Fast & Furious Presents: Hobbs & Shaw', 1562956200, '2h 16m', '<p>Brixton Lorr is a cybernetically enhanced soldier who possesses superhuman strength, a brilliant mind and a lethal pathogen that could wipe out half of the world\\\'s population. It\\\'s now up to hulking lawman Luke Hobbs and lawless operative Deckard Shaw to put aside their past differences and work tog<span class=\\\"yZlgBd\\\">ether to prevent the seemingly indestructible Lorr from destroying humanity.<br /><br /></span></p>\r\n<p><span class=\\\"example1\\\"><strong>Storyline</strong></span></p>\r\n<p>Lawman Luke Hobbs and outcast Deckard Shaw form an unlikely alliance when a cyber-genetically enhanced villain threatens the future of humanity.<br /><br /><iframe src=\\\"https://www.youtube.com/embed/HZ7PAyCDwEg\\\" width=\\\"386\\\" height=\\\"217\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"allowfullscreen\\\"></iframe><br /><br /></p>\r\n<p><strong>Directed by</strong></p>\r\n<p>David Leitch...&nbsp; &nbsp;Writing Credits <br />Chris Morgan...&nbsp; (screenplay by) and<br />Drew Pearce...&nbsp; &nbsp;(screenplay by)<br />Chris Morgan...&nbsp; (story by)<br />Gary Scott Thompson... (based on characters created by)</p>\r\n<p>&nbsp;</p>', 'fast-furious-presents-hobbs-shaw', 'FFHS.jpg', 'FFHS2.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_MP4.mp4', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(16, 'Paid', 2, '3', 'Toy Story 4', 1561055400, '1h 40m', '<p>Woody, Buzz Lightyear and the rest of the gang embark on a road trip with Bonnie and a new toy named Forky. The adventurous journey turns into an unexpected reunion as <strong>Woody\\\'s</strong> slight detour leads him to his long-lost <strong>friend</strong> Bo Peep. As Woody and Bo discuss the old days, they soon start to realize th<span class=\\\"yZlgBd\\\">at they\\\'re worlds apart when it comes to what they want from <strong>life</strong> as a toy.<br /><br /></span><iframe src=\\\"https://player.vimeo.com/video/367512707\\\" width=\\\"100%\\\" height=\\\"360\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"allowfullscreen\\\"></iframe><br /><br /><strong>Release date:</strong> 21 June 2019 (India)<br /><strong>Director:</strong> Josh Cooley<br /><strong>Box office:</strong> 107 crores USD<br /><strong>Initial DVD release:</strong> 8 October 2019 (USA)<br /><br /><strong>Did you know:</strong> \\\"Toy Story 4\\\" is the fifth-highest-grossing animated film of all time.<br /><br /><img src=\\\"../../admin_assets/plugins/tinymce/plugins/emoticons/img/smiley-cool.gif\\\" alt=\\\"cool\\\" /><img src=\\\"../../admin_assets/plugins/tinymce/plugins/emoticons/img/smiley-money-mouth.gif\\\" alt=\\\"money-mouth\\\" /></p>', 'toy-story-4', 'TS4.jpg', 'Toys1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/wmiIUN-7qhE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 19:15:48'),
(17, 'Free', 2, '1,8', 'The Notebook', 1088101800, '2h 4m', '<p><em><strong>The Notebook</strong></em> is a 2004 romantic drama film directed by Nick Cassavetes and written by Jeremy Leven from Jan Sardi\\\'s adaptation of the 1996 novel by Nicholas Sparks. The film stars Ryan Gosling and Rachel McAdams as a young couple who fall in love in the 1940s. Their story is narrated from the present day by an elderly man, (played by James Garner), telling the tale to a fellow nursing home resident (played by Gena Rowlands, who is Cassavetes\\\'s mother).</p>\r\n<p>The Notebook received generally mixed reviews, but performed well at the box office and received a number of award nominations, winning eight Teen Choice Awards, a Satellite Award, and an MTV Movie Award. The film became a sleeper hit[] and has gained a cult following. On November 11, 2012, ABC Family premiered an extended version with deleted scenes added back into the original storyline.<br /><br /><img src=\\\"https://awol.junkee.com/wp-content/uploads/2018/02/ryan-gosling-rachel-mcadams-the-notebook-680x425.jpg\\\" alt=\\\"The Notebook\\\" width=\\\"680\\\" height=\\\"425\\\" /></p>', 'the-notebook', 'TNB.jpg', 'Pelicula-The-Notebook-l.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/YPn4tXT7ZDM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '5', NULL, '', '', '', 1, NULL, '2020-03-12 18:54:00'),
(18, 'Free', 2, '3,1,8', 'Crazy Rich Asians', 1534271400, '2h 1m', '<p>Rachel, a professor, dates a man named Nick and looks forward to meeting his family. However, she is shaken up when she learns that Nick belongs to one of the richest families in the country.<br /><br />This contemporary romantic comedy, based on a global bestseller, follows native New Yorker Rachel Chu to Singapore to meet her boyfriend\\\'s family.<br /><br />Rachel Chu, an American-born Chinese NYU professor, travels with her boyfriend, Nick to his hometown of Singapore for his best friend\\\'s wedding. Before long, his secret is out: Nick\\\'s family is wealthy, and he\\\'s considered the most eligible bachelor in Asia. Every single woman is incredibly jealous of Rachel and wants to bring her down.</p>\r\n<p><a title=\\\"Crazy Rich Asians\\\" href=\\\"https://www.imdb.com/title/tt3104988/\\\" target=\\\"_blank\\\">Crazy Rich Asians</a><br /><br /><br /><img src=\\\"https://lwlies.com/wp-content/uploads/2018/09/crazy-rich-asians-768x539-c-default.jpg\\\" alt=\\\"Crazy Rich Asians\\\" width=\\\"768\\\" height=\\\"539\\\" /></p>', 'crazy-rich-asians', 'CrazyRichAsians.jpg', 'crazy-rich-asians.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/IWjRYlJQxHo?list=TLPQMjUxMTIwMTnjNyFOoCVZvg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 19:56:06'),
(19, 'Free', 2, '1,8,5', 'Safe Haven', 1360780200, '115 minutes', '<p>A mysterious young woman arrives in Southport, North Carolina. She falls in love with a widowed store owner. But her dark past intrudes in her new life.</p>\r\n<p>A terrified woman, Erin, flees her house in Boston, having been in the possession of a bloody knife. After taking shelter with a neighbor, she is at the bus station trying to flee town. She buys a bus ticket with her hair now cropped and bleached and stops in the small town of Southport, North Carolina. At the general store, she introduces herself as Katie Feldman. After getting a job as a waitress, and renting a small <a href=\\\"http://viaviweb.com/\\\" target=\\\"_blank\\\">house</a> on the edge of town, Katie befriends her neighbor, Jo. She meets Alex Wheatley who operates the local general store, and is a widowed father of two young children, Josh, who has a strained relationship with him, and Lexie. Alex soon gives Katie a bicycle so she won\\\'t have to walk. She over-reacts negatively to the kind gesture, not wishing to \\\"owe anything to anyone\\\".</p>\r\n<p>It is not long before Katie and Alex start a relationship, and she becomes like a mother to Josh and Lexie. Meanwhile, Kevin Tierney, a Boston police detective, prepares wanted posters for a woman named \\\"Erin\\\" which describes that she is wanted for first-degree murder. Alex sees Erin\\\'s wanted poster in the police station and notices the picture bears a striking resemblance to Katie. He confronts Katie with the information, causing a huge fight - she attempts to explain that she was young and stupid and married a man who only hurt her - but they break up, and Katie moves out of her house.</p>\r\n<p>As Katie is about to leave town, Alex intercepts her and says that he has fallen in love with her, begs her not to leave and promises to keep her safe. Katie reluctantly returns his love, and decides to stay in Southport (though still apprehensive of bringing danger upon Alex\\\'s family.) She tells Alex that she fled to Southport to escape her abusive and alcoholic cop husband. They got in a big fight and that she stabbed him in self-defense before she fled south in a panic, in hopes of finally escaping him and his abuse.</p>\r\n<p>Meanwhile, Kevin is suspended for creating the wanted posters for crimes that weren\\\'t committed, whereupon it is revealed that he is Katie\\\'s (Erin\\\'s) abusive and alcoholic husband, still very much alive and well. Enraged, he breaks into Katie\\\'s former neighbor\\\'s home back in Boston and finds the phone number to the Southport restaurant where Katie works. Arriving in time for the town\\\'s Fourth of July parade, a severely intoxicated Kevin sees Katie kissing Alex, which enrages him. That night, Katie has a dream that she is standing on the docks watching the fireworks when Jo comes up and tells Katie that \\\"he\\\" is here. Katie wakes up in the convenience store next to a sleeping Lexie when Kevin suddenly appears and confronts her, demanding that she go back with him. She refuses and tells him to leave. Kevin pulls a gun and pours gasoline all over the store, with the intent to burn it down.</p>\r\n<p>When he hesitates, Katie buys time by faking sympathy for him and agreeing to return home with him. When he lets his guard down, she pushes him into the water. A firework spark lands on the gasoline, igniting a fire that engulfs the store. Alex sees the burning store, quickly makes his way across the harbor by boat, and saves Lexie. Meanwhile, Katie tries to fight off Kevin; during the struggle, the gun goes off and kills Kevin, actually finally ridding her of him forever.</p>\r\n<p>In the aftermath of the fire, Alex recovers several letters which were written by his late wife Carly before she died. The letters were prepared ahead of time for memorable events such as Josh\\\'s eighteenth birthday and Lexie\\\'s wedding day. Alex gives Katie a letter with the words \\\"To Her\\\" on the envelope. The letter explains that Alex must be in love to have given her the letter and she hopes that she feels the same way, and wishes that she could be there with them. Enclosed with the letter is a photo of Alex\\\'s late wife. Katie realizes that her neighbor \\\"Jo\\\" was the ghost of Carly watching over them.</p>', 'safe-haven', 'Safe Haven.jpg', 'Safe Haven2.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_MP4.mp4', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(20, 'Paid', 3, '3,8', 'Ocho apellidos vascos', 1394735400, '1h 38m', '<p><em><strong>Ocho apellidos vascos</strong></em> (English: Eight Basque Surnames), known as Spanish Affair in English, is a 2014 Spanish comedy film directed by Emilio Mart&iacute;nez-L&aacute;zaro.[1] It premiered in Spain on 14 March 2014. Six weeks after its release, it became the second biggest box office hit ever in Spain, behind Avatar.</p>\r\n<p>Rafa (Dani Rovira) nunca ha dejado su Sevilla natal, Andaluc&iacute;a, hasta que conoce a una ni&ntilde;a vasca llamada Amaia (Clara Lago), que se resiste a sus t&eacute;cnicas de seducci&oacute;n. Contra el consejo de sus amigos, &eacute;l la sigue hasta Euskadi despu&eacute;s de que ella pasa la noche en su casa y olvida su bolso. Una serie de malentendidos obliga a Rafa a hacerse pasar por un vasco de pura sangre con ocho apellidos (Gabilondo, Urdangar&iacute;n, Zubizarreta, Argui&ntilde;ano del padre e Igartiburu, Erentxun, Otegi y Clemente de la madre), y se enreda cada vez m&aacute;s en ese personaje. para complacer a Amaia.</p>', 'ocho-apellidos-vascos', '220px-Ocho_apellidos_vascos_poster.jpg', 'ochoapellidosvascosglupglup.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/PVWkQBgdCRA?list=PLMHyMvcjXso5xTI9rjn04JX6FzWeLweQy\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-10 19:55:34'),
(21, 'Free', 3, '1,8', 'Belle Epoque', 723407400, '1h 49m', '<p>Mientras Espa&ntilde;a se encuentra al borde del precipicio de la guerra civil en 1930, Fernando (Jorge Sanz) opta por abandonar el ej&eacute;rcito. Pronto se encuentra con la casa de campo del rico Manolo (Fernando Fern&aacute;n G&oacute;mez), quien invita a Fernando a quedarse con &eacute;l. Luego, Fernando presenta a las hijas de Manolo, Clara (Miriam D&iacute;az-Aroca), Violeta (Ariadna Gil), Roc&iacute;o (Maribel Verd&uacute;) y Luz (Pen&eacute;lope Cruz), y tiene encuentros cercanos con cada una de ellas, pero surge un problema cuando No puede decidir con qu&eacute; belleza casarse.</p>', 'belle-epoque', 'Belle-Epoque-1992-poster.jpg', 'Belle-Epoque-1992-poster2.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, NULL, '0', NULL, '', '', '', 1, NULL, '2020-03-12 19:51:18'),
(22, 'Free', 3, '1,6', 'El espinazo del diablo (The Devil\'s Backbone)', 987705000, '1h 48m', '<p><em><strong>The Devil\\\'s Backbone</strong></em> (espa&ntilde;ol: El espinazo del diablo) es una pel&iacute;cula de terror g&oacute;tico de 2001 dirigida por Guillermo del Toro y escrita por del Toro, David Mu&ntilde;oz y Antonio Trashorras. Fue producido independientemente por Pedro Almod&oacute;var como una coproducci&oacute;n internacional entre Espa&ntilde;a y M&eacute;xico, y fue filmado en Madrid.</p>\r\n<p>La pel&iacute;cula est&aacute; ambientada en Espa&ntilde;a, 1939, durante el &uacute;ltimo a&ntilde;o de la Guerra Civil espa&ntilde;ola. La pel&iacute;cula fue lanzada con cr&iacute;ticas muy positivas de los cr&iacute;ticos.<br /><br /><iframe src=\\\"https://www.youtube.com/embed/9FSoUgusNzc?list=PLMHyMvcjXso5xTI9rjn04JX6FzWeLweQy\\\" width=\\\"582\\\" height=\\\"327\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"allowfullscreen\\\"></iframe></p>', 'el-espinazo-del-diablo-the-devils-backbone', 'The Devils Backbone.jpg', 'TDB1 (2).jpg', 'URL', 'http://mysisli.com/36bay2/gin/giniko_1tvafg_800kb_36bay2/tracks-v1a1/mono.m3u8', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, 1, NULL, '2020-02-03 16:44:44'),
(23, 'Free', 1, '3,1', 'à¤¸à¥à¤¤à¥à¤°à¥€ (Stree)', 1535653800, '2h 9m', '<p><strong>à¤¬à¥ˆà¤¨à¤° :</strong> à¤®à¥ˆà¤¡à¤¡à¥‰à¤• à¤«à¤¿à¤²à¥à¤®à¥à¤¸, à¤¡à¥€2à¤†à¤° à¤«à¤¿à¤²à¥à¤®à¥à¤¸ à¤ªà¥à¤°à¤¾.à¤²à¤¿.<br /><strong>à¤¨à¤¿à¤°à¥à¤®à¤¾à¤¤à¤¾ :</strong> à¤¦à¤¿à¤¨à¥‡à¤¶ à¤µà¤¿à¤œà¤¨, à¤°à¤¾à¤œ-à¤¡à¥€à¤•à¥‡<br /><strong>à¤¨à¤¿à¤°à¥à¤¦à¥‡à¤¶à¤• :</strong> à¤…à¤®à¤° à¤•à¥Œà¤¶à¤¿à¤•<br /><strong>à¤¸à¤‚à¤—à¥€à¤¤ :</strong> à¤¸à¤šà¤¿à¤¨ à¤¸à¤‚à¤˜à¤µà¥€, à¤œà¤¿à¤—à¤° à¤¸à¤°à¥ˆà¤¯à¤¾<br /><strong>à¤•à¤²à¤¾à¤•à¤¾à¤° :</strong> <span style=\\\"color: #ff0000;\\\">à¤°à¤¾à¤œà¤•à¥à¤®à¤¾à¤° à¤°à¤¾à¤µ, à¤¶à¥à¤°à¤¦à¥à¤§à¤¾ à¤•à¤ªà¥‚à¤°, à¤ªà¤‚à¤•à¤œ à¤¤à¥à¤°à¤¿à¤ªà¤¾à¤ à¥€, à¤…à¤ªà¤¾à¤°à¤¶à¤•à¥à¤¤à¤¿ à¤–à¥à¤°à¤¾à¤¨à¤¾, à¤…à¤­à¤¿à¤·à¥‡à¤• à¤¬à¥ˆà¤¨à¤°à¥à¤œà¥€, à¤•à¥ƒà¤¤à¤¿ à¤¸à¥‡à¤¨à¤¨ (à¤†à¤‡à¤Ÿà¤® à¤¨à¤‚à¤¬à¤°)</span></p>\r\n<p>à¤‡à¤¸ à¤¸à¤¾à¤² à¤®à¤°à¥à¤¦ à¤•à¥‹ à¤¦à¤°à¥à¤¦ à¤¹à¥‹à¤—à¤¾à¥¤ à¤¯à¤¹ à¤•à¤¹à¤¨à¤¾ à¤¹à¥ˆ \\\'à¤¸à¥à¤¤à¥à¤°à¥€\\\' à¤•à¥‡ à¤Ÿà¥à¤°à¥‡à¤²à¤° à¤•à¤¾à¥¤ à¤‡à¤¸à¥‡ à¤¹à¥‰à¤°à¤°-à¤•à¥‰à¤®à¥‡à¤¡à¥€ à¤®à¥‚à¤µà¥€ à¤•à¤¹à¤¾ à¤œà¤¾ à¤°à¤¹à¤¾ à¤¹à¥ˆ à¤œà¤¿à¤¸à¤•à¥€ à¤à¤²à¤• à¤¹à¤® à¤Ÿà¥à¤°à¥‡à¤²à¤° à¤®à¥‡à¤‚ à¤¦à¥‡à¤– à¤šà¥à¤•à¥‡ à¤¹à¥ˆà¤‚à¥¤</p>\r\n<p>à¤¯à¤¹ à¤•à¤¹à¤¾à¤¨à¥€ à¤¹à¥ˆ à¤šà¤‚à¤¦à¥‡à¤°à¥€ à¤¨à¤¾à¤®à¤• à¤œà¤—à¤¹ à¤•à¥€à¥¤ à¤›à¥‹à¤Ÿà¤¾-à¤¸à¤¾ à¤¶à¤¹à¤° à¤¹à¥ˆà¥¤ à¤¯à¤¹à¤¾à¤‚ à¤à¤• à¤…à¤œà¥€à¤¬ à¤¸à¥à¤¤à¥à¤°à¥€ à¤šà¤°à¥à¤šà¤¾ à¤®à¥‡à¤‚ à¤¹à¥ˆà¥¤ à¤œà¥‹ à¤ªà¥à¤°à¥à¤·à¥‹à¤‚ à¤•à¥‹ à¤‰à¤¨à¤•à¥‡ à¤¨à¤¾à¤® à¤¸à¥‡ à¤¬à¥à¤²à¤¾à¤¤à¥€ à¤¹à¥ˆà¥¤ à¤…à¤šà¤¾à¤¨à¤• à¤•à¤ˆ à¤ªà¥à¤°à¥à¤· à¤—à¤¾à¤¯à¤¬ à¤¹à¥‹à¤¨à¥‡ à¤²à¤—à¤¤à¥‡ à¤¹à¥ˆà¤‚à¥¤ à¤¸à¤¿à¤°à¥à¤« à¤‰à¤¨à¤•à¥‡ à¤•à¤ªà¤¡à¤¼à¥‡ à¤¹à¥€ à¤®à¤¿à¤²à¤¤à¥‡ à¤¹à¥ˆà¤‚à¥¤ à¤•à¥‹à¤ˆ à¤¨à¤¹à¥€à¤‚ à¤œà¤¾à¤¨à¤¤à¤¾ à¤•à¤¿ à¤¯à¤¹ à¤•à¥à¤¯à¤¾ à¤¹à¥‹ à¤°à¤¹à¤¾ à¤¹à¥ˆ? à¤•à¥à¤¯à¥‹à¤‚ à¤¹à¥‹ à¤°à¤¹à¤¾ à¤¹à¥ˆ? à¤¸à¤¬à¤•à¥‡ à¤ªà¤¾à¤¸ à¤…à¤ªà¤¨à¥€-à¤…à¤ªà¤¨à¥€ à¤•à¤¹à¤¾à¤¨à¤¿à¤¯à¤¾à¤‚ à¤¹à¥ˆà¤‚à¥¤ à¤•à¥‹à¤ˆ à¤•à¤¹à¤¤à¤¾ à¤¹à¥ˆ à¤•à¤¿ à¤¯à¤¹ à¤¸à¥à¤¤à¥à¤°à¥€ à¤¹à¥€ à¤¸à¤¬ à¤•à¤° à¤°à¤¹à¥€ à¤¹à¥ˆà¥¤ à¤…à¤œà¥€à¤¬-à¤¸à¤¾ à¤¡à¤° à¤•à¤¾ à¤®à¤¾à¤¹à¥Œà¤² à¤¶à¤¹à¤° à¤®à¥‡à¤‚ à¤ªà¤¸à¤°à¤¾ à¤¹à¥à¤† à¤¹à¥ˆà¥¤ à¤˜à¤° à¤•à¥€ à¤¦à¥€à¤µà¤¾à¤°à¥‹à¤‚ à¤ªà¤° à¤²à¤¿à¤– à¤¦à¤¿à¤¯à¤¾ à¤¹à¥ˆ \\\'à¤“ à¤¸à¥à¤¤à¥à¤°à¥€, à¤•à¤² à¤†à¤¨à¤¾\\\'à¥¤</p>\r\n<p>à¤šà¤‚à¤¦à¥‡à¤°à¥€ à¤•à¤¾ à¤®à¤¨à¥€à¤· à¤®à¤²à¥à¤¹à¥‹à¤¤à¥à¤°à¤¾ à¤¯à¤¾à¤¨à¥€ à¤•à¤¿ à¤µà¤¿à¤•à¥à¤•à¥€ (à¤°à¤¾à¤œà¤•à¥à¤®à¤¾à¤° à¤°à¤¾à¤µ) à¤²à¥‡à¤¡à¤¿à¤¸ à¤Ÿà¥‡à¤²à¤° à¤¹à¥ˆ à¤œà¥‹ à¤®à¤¾à¤¤à¥à¤° 31 à¤®à¤¿à¤¨à¤Ÿ à¤®à¥‡à¤‚ à¤²à¤¹à¤‚à¤—à¤¾ à¤¸à¤¿à¤² à¤¦à¥‡à¤¤à¤¾ à¤¹à¥ˆà¥¤ à¤‰à¤¸à¤•à¥‡ à¤¦à¥‹ à¤–à¤¾à¤¸ à¤¯à¤¾à¤° à¤¹à¥ˆà¤‚, à¤¬à¤¿à¤Ÿà¥à¤Ÿà¥‚ (à¤…à¤ªà¤¾à¤°à¤¶à¤•à¥à¤¤à¤¿ à¤–à¥à¤°à¤¾à¤¨à¤¾) à¤”à¤° à¤œà¤¾à¤¨à¤¾ (à¤…à¤­à¤¿à¤·à¥‡à¤• à¤¬à¥ˆà¤¨à¤°à¥à¤œà¥€)à¥¤</p>\r\n<p>à¤µà¤¿à¤•à¥à¤•à¥€ à¤•à¥€ à¤®à¥à¤²à¤¾à¤•à¤¾à¤¤ à¤à¤• à¤²à¤¡à¤¼à¤•à¥€ (à¤¶à¥à¤°à¤¦à¥à¤§à¤¾ à¤•à¤ªà¥‚à¤°) à¤¸à¥‡ à¤¹à¥‹à¤¤à¥€ à¤¹à¥ˆ à¤œà¥‹ à¤‰à¤¸à¥‡ à¤ªà¤¸à¤‚à¤¦ à¤†à¤¤à¥€ à¤¹à¥ˆà¥¤ à¤‡à¤¸à¤¸à¥‡ à¤¬à¤¿à¤Ÿà¥à¤Ÿà¥‚ à¤•à¥‹ à¤œà¤²à¤¨ à¤¹à¥‹à¤¨à¥‡ à¤²à¤—à¤¤à¥€ à¤¹à¥ˆà¥¤ à¤¯à¤¹ à¤²à¤¡à¤¼à¤•à¥€ à¤ªà¥‚à¤œà¤¾ à¤µà¤¾à¤²à¥‡ à¤¦à¤¿à¤¨à¥‹à¤‚ à¤®à¥‡à¤‚ à¤¹à¥€ à¤†à¤¤à¥€ à¤¹à¥ˆ, à¤¨à¤¾à¤® à¤¨à¤¹à¥€à¤‚ à¤¬à¤¤à¤¾à¤¤à¥€, à¤‰à¤¸à¤•à¥‡ à¤ªà¤¾à¤¸ à¤®à¥‹à¤¬à¤¾à¤‡à¤² à¤­à¥€ à¤¨à¤¹à¥€à¤‚ à¤¹à¥ˆà¥¤</p>\r\n<p>à¤¬à¤¿à¤Ÿà¥à¤Ÿà¥‚ à¤•à¥‹ à¤¶à¤• à¤¹à¥ˆ à¤•à¤¿ à¤¯à¤¹à¥€ à¤µà¥‹ à¤¸à¥à¤¤à¥à¤°à¥€ à¤¹à¥ˆ à¤œà¤¿à¤¸à¤¨à¥‡ à¤šà¤‚à¤¦à¥‡à¤°à¥€ à¤•à¥‡ à¤ªà¥à¤°à¥à¤·à¥‹à¤‚ à¤•à¥‹ à¤ªà¤°à¥‡à¤¶à¤¾à¤¨ à¤•à¤° à¤°à¤–à¤¾ à¤¹à¥ˆà¥¤ à¤¬à¤¿à¤Ÿà¥à¤Ÿà¥‚, à¤µà¤¿à¤•à¥à¤•à¥€, à¤œà¤¾à¤¨à¤¾ à¤”à¤° à¤°à¥‚à¤¦à¥à¤° (à¤ªà¤‚à¤•à¤œ à¤¤à¥à¤°à¤¿à¤ªà¤¾à¤ à¥€) à¤‡à¤¸ à¤°à¤¹à¤¸à¥à¤¯ à¤¸à¥‡ à¤ªà¤°à¤¦à¤¾ à¤‰à¤ à¤¾à¤¤à¥‡ à¤¹à¥ˆà¤‚à¥¤</p>\r\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: 211px; top: 172px;\\\">&nbsp;</div>', 'stree', 'stree.jpg', 'stree2.jpg', 'Local', 'dolbycanyon_MP4.mp4', 1, 'http://videostreaming.viavilab.com/upload/source/dolbycanyon_MP4.mp4', NULL, '5', NULL, 'Stree Movie', 'à¤‡à¤¸ à¤¸à¤¾à¤² à¤®à¤°à¥à¤¦ à¤•à¥‹ à¤¦à¤°à¥à¤¦ à¤¹à¥‹à¤—à¤¾à¥¤ à¤¯à¤¹ à¤•à¤¹à¤¨à¤¾ à¤¹à¥ˆ \\\'à¤¸à¥à¤¤à¥à¤°à¥€\\\' à¤•à¥‡ à¤Ÿà¥à¤°à¥‡à¤²à¤° à¤•à¤¾à¥¤ à¤‡à¤¸à¥‡ à¤¹à¥‰à¤°à¤°-à¤•à¥‰à¤®à¥‡à¤¡à¥€ à¤®à¥‚à¤µà¥€ à¤•à¤¹à¤¾ à¤œà¤¾ à¤°à¤¹à¤¾ à¤¹à¥ˆ à¤œà¤¿à¤¸à¤•à¥€ à¤à¤²à¤• à¤¹à¤® à¤Ÿà¥à¤°à¥‡à¤²à¤° à¤®à¥‡à¤‚ à¤¦à¥‡à¤– à¤šà¥à¤•à¥‡ à¤¹à¥ˆà¤‚à¥¤', 'Stree,Movie', 1, NULL, '2020-03-12 19:00:45'),
(25, 'Paid', 2, '2,3', 'Baywatch', 1495650600, '116 min', '<p>In sun-kissed Emerald Bay, the vigorous Lieutenant Mitch Buchannon and Baywatch, his elite team of hand-picked and perfectly tanned lifeguards, protect the bay, keeping both sunbathers and beach lovers safe. However, this summer, two new eager trainees will join the demanding life-saving program, as well as an insubordinate former Olympic swimmer, who are all called to prove their worth on the lifeguard towers just on time when a new synthetic street drug begins to infest the Emerald Bay: the flakka. Without a doubt, this calls for some serious undercover teamwork action, as the badgeless heroes in spandex comb the beach for shady newcomers and nefarious entrepreneurs with hidden agendas of their own. Can Mitch\\\'s band save the bay?</p>\r\n<p><strong>Director</strong>: Seth Gordon</p>\r\n<p><strong>Writer</strong>: Michael Berk (based on the series \\\"Baywatch\\\" created by), Douglas Schwartz (based on the series \\\"Baywatch\\\" created by), Gregory J. Bonann (based on the series \\\"Baywatch\\\" created by), Jay Scherick (story by), David Ronn (story by), Thomas Lennon (story by), Robert Ben Garant (story by), Damian Shannon (screenplay by), Mark Swift (screenplay by)</p>\r\n<p><strong>Actors</strong>: Dwayne Johnson, Zac Efron, Priyanka Chopra, Alexandra Daddario</p>\r\n<p><strong>Production</strong>: Paramount Pictures</p>', 'baywatch', 'MV5BNTA4MjQ0ODQzNF5BMl5BanBnXkFtZTgwNzA5NjYzMjI@._V1_SX300.jpg', 'MV5BNTA4MjQ0ODQzNF5BMl5BanBnXkFtZTgwNzA5NjYzMjI@._V1_SX300.jpg', 'Local', NULL, 0, NULL, NULL, NULL, NULL, '', '', '', 1, NULL, '2020-02-20 22:41:08'),
(26, 'Paid', 2, '2,9,3,10', 'Guardians of the Galaxy Vol. 2', 1493922600, '136 min', '<p>After saving Xandar from Ronan\\\'s wrath, the Guardians are now recognized as heroes. Now the team must help their leader Star Lord (Chris Pratt) uncover the truth behind his true heritage. Along the way, old foes turn to allies and betrayal is blooming. And the Guardians find that they are up against a devastating new menace who is out to rule the galaxy.</p>\r\n<p><strong>Director</strong>: James Gunn</p>\r\n<p><strong>Writer</strong>: James Gunn, Dan Abnett (based on the Marvel comics by), Andy Lanning (based on the Marvel comics by), Steve Englehart (Star-Lord created by), Steve Gan (Star-Lord created by), Jim Starlin (Gamora and Drax created by), Stan Lee (Groot created by), Larry Lieber (Groot created by), Jack Kirby (Groot created by), Bill Mantlo (Rocket Raccoon created by), Keith Giffen (Rocket Raccoon created by), Steve Gerber (Howard the Duck created by), Val Mayerik (Howard the Duck created by)</p>\r\n<p><strong>Actors</strong>: Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel</p>\r\n<p><strong>Production</strong>: Walt Disney Pictures</p>\r\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: 185px; top: 51px;\\\">&nbsp;</div>', 'guardians-of-the-galaxy-vol-2', 'MV5BNjM0NTc0NzItM2FlYS00YzEwLWE0YmUtNTA2ZWIzODc2OTgxXkEyXkFqcGdeQXVyNTgwNzIyNzg@._V1_SX300.jpg', 'DIS_GOTG2_GA_NP_1285x720.png', 'Embed', NULL, 0, NULL, NULL, '7.6', NULL, 'Guardians of the Galaxy', 'After saving Xandar from Ronan\\\'s wrath, the Guardians are now recognized as heroes. Now the team must help their leader Star Lord (Chris Pratt) uncover the truth behind his true heritage.', 'Guardians,Galaxy,Ronan\\\'s', 1, NULL, '2020-03-05 00:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(500) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_content`, `status`) VALUES
(1, 'About Us', 'about-us', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.</p>', 1),
(2, 'Terms Of Use', 'terms-of-use', '<p><strong>Use of this site is provided by Demos subject to the following Terms and Conditions:</strong><br />1. Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.<br />2. Demos reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of this site after changes are posted constitutes your acceptance of this agreement as modified.<br />3. You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.<br />4. This site and the information, names, images, pictures, logos regarding or relating to Demos are provided &ldquo;as is&rdquo; without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.<br />5. Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.<br />6. Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.<br />7. Demos takes no responsibility for the content of external Internet Sites.<br />8. Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.<br />9. If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.<br />10. These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.<br />11. If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.</p>', 1),
(3, 'Privacy Policy', 'privacy-policy', '<h1>Privacy Policy of&nbsp;<span class=\\\"highlight preview_company_name\\\">Company Name</span></h1>\r\n<p><span class=\\\"highlight preview_company_name\\\">Company Name</span>&nbsp;operates the&nbsp;<span class=\\\"highlight preview_website_name\\\">Website Name</span>&nbsp;website, which provides the SERVICE.</p>\r\n<p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service, the&nbsp;<span class=\\\"highlight preview_website_name\\\">Website Name</span>&nbsp;website.</p>\r\n<p>If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at&nbsp;<span class=\\\"highlight preview_website_url\\\">Website URL</span>, unless otherwise defined in this Privacy Policy.</p>\r\n<h2>Information Collection and Use</h2>\r\n<p>For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>\r\n<h2>Log Data</h2>\r\n<p>We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer\\\'s Internet Protocol (&ldquo;IP&rdquo;) address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>\r\n<h2>Cookies</h2>\r\n<p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer\\\'s hard drive.</p>\r\n<p>Our website uses these &ldquo;cookies&rdquo; to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.</p>\r\n<h2>Service Providers</h2>\r\n<p>We may employ third-party companies and individuals due to the following reasons:</p>\r\n<ul>\r\n<li>To facilitate our Service;</li>\r\n<li>To provide the Service on our behalf;</li>\r\n<li>To perform Service-related services; or</li>\r\n<li>To assist us in analyzing how our Service is used.</li>\r\n</ul>\r\n<p>We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n<h2>Security</h2>\r\n<p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>\r\n<h2>Links to Other Sites</h2>\r\n<p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n<p>Children\\\'s Privacy</p>\r\n<p>Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.</p>\r\n<h2>Changes to This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>\r\n<h2>Contact Us</h2>\r\n<p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>', 1),
(4, 'FAQ', 'faq', '<p>Coming Soon</p>', 1),
(5, 'Contact Us', 'contact-us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recently_watched`
--

CREATE TABLE `recently_watched` (
  `id` int(11) NOT NULL,
  `video_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `season_name` varchar(500) NOT NULL,
  `season_slug` varchar(255) NOT NULL,
  `season_poster` varchar(500) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `series_id`, `season_name`, `season_slug`, `season_poster`, `seo_title`, `seo_description`, `seo_keyword`, `status`) VALUES
(1, 1, 'Season 1', 'season-1', '13reasonwhyseason01_1.jpg', NULL, NULL, NULL, 1),
(2, 1, 'Season 2', 'season-2', '13reasonwhyseason02.jpg', NULL, NULL, NULL, 1),
(3, 2, 'Season 1', 'season-1', 'stangerthingsseason1.jpg', NULL, NULL, NULL, 1),
(4, 2, 'Season 2', 'season-2', 'stangerthingsseason2.jpg', NULL, NULL, NULL, 1),
(6, 3, 'Season 1', 'season-1', 'Houseofcardsseason1.jpg', NULL, NULL, NULL, 1),
(7, 3, 'Season 2', 'season-2', 'Houseofcardsseason2.jpg', NULL, NULL, NULL, 1),
(8, 3, 'Season 3', 'season-3', 'Houseofcardsseason3.jpg', NULL, NULL, NULL, 1),
(10, 4, 'Season 1', 'season-1', 'scaredgamesseason1.jpg', 'Season 1', 'Sacred Games Season 1', 'Sacred Games,Season1', 1),
(11, 4, 'Season 2', 'season-2', 'scaredgamesseason2.jpg', NULL, NULL, NULL, 1),
(12, 5, 'Season 1', 'season-1', 'Mirzapurseason1.jpg', NULL, NULL, NULL, 1),
(13, 6, 'Season 1', 'season-1', 'TheFamilymenseason1.jpg', NULL, NULL, NULL, 1),
(14, 8, 'Season 1', 'season-1', 'Merliseason1.jpg', NULL, NULL, NULL, 1),
(15, 7, 'Season 1', 'season-1', 'Ingobernableseason1.jpg', 'Ingobernable Season 1', 'Ingobernable Season', 'Ingobernable,Season 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `series_lang_id` int(11) NOT NULL,
  `series_genres` text NOT NULL,
  `series_name` varchar(500) NOT NULL,
  `series_slug` varchar(255) NOT NULL,
  `series_info` text NOT NULL,
  `series_poster` varchar(500) NOT NULL,
  `imdb_id` varchar(255) DEFAULT NULL,
  `imdb_rating` varchar(255) DEFAULT NULL,
  `imdb_votes` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `series_lang_id`, `series_genres`, `series_name`, `series_slug`, `series_info`, `series_poster`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `status`) VALUES
(1, 2, '1', '13 Reasons Why', '13-reasons-why', 'Newcomer Katherine Langford plays the role of Hannah, a young woman who takes her own life. Two weeks after her tragic death, a classmate named Clay finds a mysterious box on his porch. Inside the box are recordings made by Hannah -- on whom Clay had a crush -- in which she explains the 13 reasons why she chose to commit suicide. If Clay decides to listen to the recordings, he will find out if and how he made the list. This intricate and heart-wrenching tale is told through Clay and Hannah\\\'s dual narratives.', '13reasonwhy.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, '6,4', 'Stranger Things', 'stranger-things', 'It\\\'s the fall of 1984, about a year after Will Byers was found, and he has been plagued by seeing visions of the Upside Down featuring a more dangerous monster. That leads the boy to see a suspiciously friendly new doctor, with the possibility that Will\\\'s visions are the result of suffering from PTSD. Nancy deals with survivor\\\'s remorse over the death of best friend Barb. Meanwhile, a new sinister entity threatens the Hawkins residents who survived the year-earlier events. New to the town is tomboy Max, who befriends the boys and attracts the romantic interests of Dustin and Lucas.', 'Stranger_Things_logo.png', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 2, '1,5', 'House of Cards', 'house-of-cards', 'Frank Underwood is a Democrat appointed as the secretary of state. Along with his wife, he sets out on a quest to seek revenge on the people who betrayed him while successfully rising to supremacy.', 'Houseofcards.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 1, '1,5', 'Sacred Games', 'sacred-games', 'When police officer Sartaj Singh receives an anonymous tip about the location of criminal overlord Ganesh Gaitonde, he embarks on a chase around Mumbai in what becomes a dangerous cat-and-mouse game. Amidst the chaos, trappings of a corrupt underworld are revealed. After being removed from the Gaitonde case, Singh begins his own investigation as he works to save Mumbai from impending doom. Flashbacks reveal some of the crimes that Gaitonde has committed through the years.', 'SacredGamesstills7.jpg', NULL, '8.9', NULL, '', '', '', 1),
(5, 1, '2,5', 'Mirzapur', 'mirzapur', 'Akhandanand Tripathi made millions exporting carpets and became the mafia boss of Mirzapur. His son Munna, an unworthy, power-hungry heir, stops at nothing to continue his father\\\'s legacy.', 'Mirzapur1.jpg', NULL, '5', NULL, '', '', '', 1),
(6, 1, '2,1', 'The Family Man', 'the-family-man', 'Srikant Tiwari is a middle-class man who also serves as a world-class spy. Srikant tries to balance his familial responsibilities with the demands of the highly secretive special cell of the National Intelligency Agency that he is working for.', 'TheFamilymen.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 3, '2,1', 'Ingobernable', 'ingobernable', 'The first lady of Mexico, a woman of conviction and ideals, must uncover the truth when she loses faith in her husband.', 'IngobernableS01E01 - Copy.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 3, '3,8', 'MerlÃ­', 'merli', 'MerlÃ­ is a Spanish television series produced by the Catalan channel TV3 about a philosophy teacher of the same name who encourages students to think freely using unorthodox methods.', 'Merli.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 4, '2,9,1,8', 'Vikings', 'vikings', 'Vikings transports us to the brutal and mysterious world of Ragnar Lothbrok, a Viking warrior and farmer who yearns to explore - and raid - the distant shores across the ocean.', 'MV5BNTA4MjQ0ODQzNF5BMl5BanBnXkFtZTgwNzA5NjYzMjI@._V1_SX300.jpg', NULL, '8.0', NULL, 'Vikings TV Show', 'Vikings transports us to the brutal and mysterious world of Ragnar Lothbrok, a Viking warrior and farmer who yearns to explore - and raid - the distant shores across the ocean.', 'Vikings,TV Show', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UTC',
  `default_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `styling` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'light',
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keywords` text COLLATE utf8_unicode_ci,
  `site_header_code` text COLLATE utf8_unicode_ci,
  `site_footer_code` text COLLATE utf8_unicode_ci,
  `site_copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_payment_on_off` int(1) NOT NULL DEFAULT '1',
  `paypal_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sandbox',
  `paypal_client_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_secret` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_payment_on_off` int(1) NOT NULL DEFAULT '1',
  `stripe_secret_key` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_publishable_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razorpay_payment_on_off` int(1) NOT NULL DEFAULT '0',
  `razorpay_key` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razorpay_secret` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_fb_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_twitter_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_instagram_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_google_play_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_apple_store_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_encryption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdpr_cookie_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdpr_cookie_text` text COLLATE utf8_unicode_ci,
  `gdpr_cookie_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `omdb_api_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external_css_js` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'local',
  `maintenance mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `time_zone`, `default_language`, `styling`, `site_name`, `site_email`, `site_logo`, `site_favicon`, `site_description`, `site_keywords`, `site_header_code`, `site_footer_code`, `site_copyright`, `currency_code`, `paypal_payment_on_off`, `paypal_mode`, `paypal_client_id`, `paypal_secret`, `stripe_payment_on_off`, `stripe_secret_key`, `stripe_publishable_key`, `razorpay_payment_on_off`, `razorpay_key`, `razorpay_secret`, `footer_fb_link`, `footer_twitter_link`, `footer_instagram_link`, `footer_google_play_link`, `footer_apple_store_link`, `smtp_host`, `smtp_port`, `smtp_email`, `smtp_password`, `smtp_encryption`, `gdpr_cookie_title`, `gdpr_cookie_text`, `gdpr_cookie_url`, `omdb_api_key`, `external_css_js`, `maintenance mode`) VALUES
(1, 'Asia/Kolkata', 'en', 'light', 'Viavi Streaming - Watch TV Shows, Movies  Online', 'user@viaviweb.in', 'logo.png', 'favicon.png', 'Viavi Streaming is Best Script for Streaming Website & Application | Streaming App | Streaming Script | TV Streaming Source Code | TV Clone | Netflix Clone | Amazon Prime Clone | Hotstar Clone | Streaming App', 'Video Streaming,Streaming Website,Streaming App,Live TV, Movies, TV Shows', '', '', 'Copyright Â© 2019 www.viaviweb.com. All Rights Reserved.', 'INR', 1, 'sandbox', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 'https://www.facebook.com/viaviweb/', 'https://twitter.com/viaviwebtech/', 'https://www.instagram.com/viaviwebtech/', 'https://play.google.com/store/apps/dev?id=7157478532572017100', 'https://apps.apple.com/in/developer/vishal-pamar/id1141291247', '', '', '', '', 'TLS', 'This website is using cookies', 'We use them to give you the best experience. If you continue using our website, we\\\'ll assume that you are happy to receive all cookies on this website.', 'http://vstar.apptific.com/page/privacy-policy', '', 'CDN', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings_android_app`
--

CREATE TABLE `settings_android_app` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `app_version` varchar(255) DEFAULT NULL,
  `app_company` varchar(255) DEFAULT NULL,
  `app_email` varchar(255) DEFAULT NULL,
  `app_website` varchar(255) DEFAULT NULL,
  `app_contact` varchar(255) DEFAULT NULL,
  `app_about` text,
  `app_privacy` text,
  `onesignal_app_id` varchar(255) DEFAULT NULL,
  `onesignal_rest_key` varchar(255) DEFAULT NULL,
  `publisher_id` varchar(500) DEFAULT NULL,
  `interstital_ad` varchar(500) DEFAULT NULL,
  `interstital_ad_id` varchar(500) DEFAULT NULL,
  `interstital_ad_click` varchar(500) DEFAULT NULL,
  `banner_ad` varchar(500) DEFAULT NULL,
  `banner_ad_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_android_app`
--

INSERT INTO `settings_android_app` (`id`, `app_name`, `app_logo`, `app_version`, `app_company`, `app_email`, `app_website`, `app_contact`, `app_about`, `app_privacy`, `onesignal_app_id`, `onesignal_rest_key`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`) VALUES
(1, 'Video Streaming App', 'logo.png', '1.0.0', 'Viavi Webtech', 'info@viaviweb.com', 'www.viaviweb.com', '+91 9227777522', '<p>Watch your favorite TV channels Live in your mobile phone with this application on your device. that support almost all format.The application is specially optimized to be extremely easy to configure and detailed documentation is provided.</p>', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n<p><strong>Information Collected</strong></p>\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n<p><strong>Information Use</strong></p>\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n<p><strong>Cookies</strong></p>\r\n<p>Your Internet browser has the in-built facility for storing small files - \\\"cookies\\\" - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n<p><strong>Disclosing Information</strong></p>\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n<p><strong>Changes to this Policy</strong></p>\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n<p><strong>Contacting Us</strong></p>\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>', '059c16eb-160c-4747-bab9-34c732d7e1a5', 'NzUyYzQ3ZGMtYmY2OC00NmM4LTkwODctNTJkMzVmZmFmNTRl', 'pub-9456493320432553', 'false', 'ca-app-pub-3940256099942544/1033173712', '2', 'false', 'ca-app-pub-3940256099942544/6300978111');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(500) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_type` varchar(255) DEFAULT NULL,
  `slider_post_id` int(11) DEFAULT NULL,
  `slider_url` text,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_image`, `slider_type`, `slider_post_id`, `slider_url`, `status`) VALUES
(3, 'House of Cards', 'ztxq8y.jpg', 'Shows', 3, 'http://vstar.apptific.com/series/house-of-cards/3', 1),
(4, 'War', 'War15.jpg', 'Movies', 9, 'http://vstar.apptific.com/movies/war/9', 1),
(5, 'Kabir Singh', 'kbs.jpg', NULL, NULL, 'http://vstar.apptific.com/movies/kabir-singh/10', 0),
(6, 'Fast & Furious Presents: Hobbs & Shaw', 'FFHS3.jpg', 'Movies', 15, 'http://vstar.apptific.com/movies/fast-furious-presents-hobbs-shaw/15', 1),
(7, 'Sacred Games', 'img.png', 'Shows', 4, 'http://vstar.apptific.com/series/sacred-games/4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports_category`
--

CREATE TABLE `sports_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports_category`
--

INSERT INTO `sports_category` (`id`, `category_name`, `category_slug`, `status`) VALUES
(8, 'Archery', 'archery', 1),
(9, 'Badminton', 'badminton', 1),
(10, 'Cricket', 'cricket', 1),
(11, 'Car racing', 'car-racing', 1),
(12, 'Football', 'football', 1),
(14, 'Hokey', 'hokey', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports_videos`
--

CREATE TABLE `sports_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `sports_cat_id` int(11) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_videos`
--

INSERT INTO `sports_videos` (`id`, `video_access`, `sports_cat_id`, `video_title`, `date`, `duration`, `video_description`, `video_slug`, `video_image`, `video_type`, `video_url`, `download_enable`, `download_url`, `seo_title`, `seo_description`, `seo_keyword`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Free', 8, 'Switzerland v India â€“ compound junior mixed team gold | World Archery Youth Championships 2019', 1567276200, '18m', '<p><a href=\\\"https://www.youtube.com/watch?v=QuvDFIotrJs\\\">Compound</a>&nbsp;junior mixed team gold medal match between Janine Hunsperger and Andrea Vallaro of Switzerland and Markoo Raginee and Sukhbeer Singh of India at the 2019 World Archery Youth Championships in Madrid, Spain. Compound archers shoot at a target 50 metres away and the central 10-ring measures just 8cm in diameter.</p>', 'switzerland-v-india-compound-junior-mixed-team-gold-world-archery-youth-championships-2019', 'Sports_Archery.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/GQQ7TbXO5DM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:13:24'),
(4, 'Paid', 8, 'Jyothi S. Vennam v Yesim Bostan â€“ compound women bronze | Den Bosch 2019 Hyundai World Championships', 1561314600, '19m', '<p>Compound women\\\'s individual bronze medal match between Jyothi Surekha Vennam of India and Yesim Bostan of Turkey at the 2019 Hyundai World Archery Championships in \\\'S-Hertogenbosch, Netherlands. Compound archers shoot at a target 50 metres away and the central 10-ring measures just 8cm in diameter.<br /><br /><iframe src=\\\"https://www.youtube.com/embed/GQQ7TbXO5DM\\\" width=\\\"427\\\" height=\\\"240\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"allowfullscreen\\\"></iframe></p>', 'jyothi-s-vennam-v-yesim-bostan-compound-women-bronze-den-bosch-2019-hyundai-world-championships', 'Sports_Archery1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/zIJzq3E1Yvk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:12:56'),
(5, 'Free', 9, 'Carolina Marin (ESP) v P.V. Sindhu (IND)- Women\\\'s Badminton Final Rio 2016', 1575484200, '1h 25m 6s', '<p>India\\\'s PV Sindhu went down 18-21 21-18 21-8 to Japan\\\'s Akane Yamaguchi in her opening game of the BWF World Tour Finals<br /><br />Enjoy this look back at the Women\\\'s Badminton singles gold medal match between Carolina Marin (ESP) and P.V. Sindhu (IND) from The 2016 Summer Olympics in beautiful Rio de Janeiro.&nbsp;</p>', 'carolina-marin-esp-v-pv-sindhu-ind-womens-badminton-final-rio-2016', 'Sports_Badminton.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/2WgNz_TO1q8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:12:42'),
(6, 'Free', 9, 'Lin Dan (CHN) v Lee Chong Wei (MAS) - Men\\\'s Badminton Singles Final | London 2012 Olympics', 1575311400, '1h 28m 26s', '<p>China\\\'s Lin Dan wins the gold medal in the men\\\'s badminton singles final against Malaysia\\\'s Lee Chong Wei.</p>\r\n<p>The sport debuted at the Olympics in 1972 with this Summer\\\'s final taking place in front of a capacity crowd at Wembley Arena.</p>', 'lin-dan-chn-v-lee-chong-wei-mas-mens-badminton-singles-final-london-2012-olympics', 'Sports_Badminton1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/LBhrpc4JrkM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:12:24'),
(7, 'Paid', 9, 'Saina Nehwal Wins Badminton Women\\\'s Singles Bronze - IND v CHN | London 2012 Olympics', 1575916200, '35m', '<p>India\\\'s Saina Nehwal wins the bronze medal in the women\\\'s badminton singles event at the London 2012 Olympic Games (4 August).</p>\r\n<p>The match was called to an end after China\\\'s Wang Xin was forced to retire with injury.</p>', 'saina-nehwal-wins-badminton-womens-singles-bronze-ind-v-chn-london-2012-olympics', 'Sports_Badminton2.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/HucIqi8Lw3E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:12:11'),
(8, 'Free', 11, 'Asian Le Mans Series Highlights', 984162600, '1h 25m', '<p>Catch all the highlights from the first round of the 2019-2020 Asian Le Mans Series in Shanghai, China</p>\r\n<p>Channel: Motorsport.tv<br />About this program: Asian Le Mans Series Highlights<br />Episode title: Round 1 - 4 Hours of Shanghai<br />Season: 2019-2020<br />Episode number: 1<br />Date: 2019-11-24<br />Run time: 53:58<br />Category: Racing coverage<br />Production: Automobile Club de l&rsquo;Ouest</p>', 'asian-le-mans-series-highlights', 'Sports_Carracing.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/IWjRYlJQxHo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:11:57'),
(9, 'Paid', 11, 'ALMS: Round 2 - Fuji', 1574879400, '1h', '<p>We head to Japan for another exciting round of the Asian Le Mans Series as these drivers leave it all on the track. Join us for a symphony of sound under Mount Fuji.</p>\r\n<p>Channel: Motorsport.tv<br />About this program: Asian Le Mans Series Highlights<br />Episode title: ALMS: Round 2 - Fuji<br />Season: 2018-2019<br />Episode number: 2<br />Date: 2018-12-9<br />Run time: 54:05<br />Category: Racing coverage</p>', 'alms-round-2-fuji', 'Sports_Carracing1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/jzLnPrwJmuA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:11:42'),
(10, 'Free', 10, 'India vs West Indies, 2nd ODI: Pant, Iyer add rage to India\'s ODI routine', 1576607400, '8h', '<p>India are still alive in the ODI series. Windies tried hard but the momentum garnered didn\\\'t last enough to recreate the Chennai magic. India have convincingly overpowered their opponents on the back of some powerful batting. India have an envious number 4 in the form of Iyer and Pant seemed to have turned it around. Kohli has failed in two games and India still have been scoring heavily. But the bowling and fielding were still a lot to be desired. And that is where Windies would look to take advantage of as the caravan moves to Cuttack. Until then, this is a Cuttack lad Kumar Abhisekh Das wishing you good bye and good night on behalf of Akshay Maanay, Sriram, Nikhil Jadhav and our scorer Sreenivas.</p>', 'india-vs-west-indies-2nd-odi-pant-iyer-add-rage-to-indias-odi-routine', 'Sports_Cricket.jpg', 'URL', 'http://vstar.apptific.com/upload/source/dolbycanyon_mkv.mkv', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(11, 'Paid', 10, 'Australia vs New Zealand, 1st Test - Live Cricket Score', 984162600, '6h', '<p>For all the hype, the series has started with a rather one-sided game. The Kiwis did show their trademark spunk with the ball, battling hard under oppressive heat despite being a bowler short. However, their batting unit couldn\\\'t show the same amount of grit and once you let the advantage slip in Australia, mostly it reaches a point of no return. The Aussies were brilliant, and like Paine said, to get 20 wickets with just three specialist bowlers in these conditions was phenomenal. There is a decent break now for Christmas, as the caravan moves to Melbourne for the Boxing Day Test. Let\\\'s hope the Kiwis are more competitive there. On that note, this is Hari Sadanandan signing off on behalf of my mates Pradeep Krishnamurthy and Praveen. We also had cameo appearances from Kumar Abhishek Das and Naga. Switch tabs to enjoy the IND-WI game. Cheers!</p>', 'australia-vs-new-zealand-1st-test-live-cricket-score', 'Sports_Cricket1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/miuLcjnRzT0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:11:23'),
(12, 'Free', 10, 'India vs Australia, 1st T20I - Live Cricket Score', 1577212200, '6h', '<p>Few pointers from the game. How good is Bumrah? G.O.A.T material in the death overs. India despite not fielding their full strength side did manage to stretch Australia to their absolute limits. And as Virat said more game time for Rahul and Pant will follow. So, India\\\'s permutations and combinations will change again keeping the larger picture in mind. Australia have managed to scratch a win here but will they pick up one more on the bounce? We shall see! This is Kumar Abhisekh Das signing off on behalf of Akshay Maanay, Abhinand Raghavendran, Varun Dikshit and Naga. Such games will ensure I need to have more medicos as friends!</p>', 'india-vs-australia-1st-t20i-live-cricket-score', 'Sports_Cricket2.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/GEZ4bJrG0Wo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:11:08'),
(13, 'Free', 12, 'Cristiano Ronaldo vs Lionel Messi', 1575484200, '1h', '<p>Ronaldo scored his first Serie A goal of the 19-20 season in a 4-3 thriller against Napoli, netting the third goal to make it 3-0.</p>\r\n<p>He then set up Aaron Ramsey\\\'s equaliser against Verona to make it 1-1, before slotting in another goal through a penalty in the second half that proved to be the winning strike.</p>', 'cristiano-ronaldo-vs-lionel-messi', 'Sports_Football.png', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/JMT8ta3Njyc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:10:50'),
(14, 'Free', 12, 'Germany vs Brazil 2014', 1401820200, '1h', '<p>Something was lost to Brazilian football yesterday that will never be recovered, not in this generation or perhaps many more to come. It was their misfortune that the second World Cup finals in their country coincided with one of the most mediocre Brazil teams in memory but even then no-one expected a defeat that Luiz Felipe Scolari himself described as &ldquo;catastrophic, terrible&rdquo;. This was football history being made.&nbsp; It was a realignment of how we think about the world game and where the power lies.</p>', 'germany-vs-brazil-2014', 'Sports_Football1.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/mnBN5YTXgys\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '', '', '', 1, NULL, '2020-03-10 22:10:37'),
(15, 'Free', 14, 'Poland v India | Men\\\'s FIH Series Finals', 1574793000, '1h', '<p>About the FIH<br /><br />Set up in 1924, the FIH is recognised by the International Olympic Committee, as well as by the FIH&rsquo;s Members and the Continental Federations, as the sole ultimate governing body for the sport of Hockey throughout the world.</p>\r\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: 383px; top: 35px;\\\">&nbsp;</div>', 'poland-v-india-mens-fih-series-finals', 'Sports_Hockey.jpg', 'Embed', '<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/gIClujtJrUA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '#', 'Poland v India | Men\\\'s FIH Series Finals', 'Hockey throughout the world', 'Poland ,India', 1, NULL, '2020-03-10 22:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_days` int(11) NOT NULL,
  `plan_duration` varchar(255) NOT NULL,
  `plan_duration_type` varchar(255) NOT NULL,
  `plan_price` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `plan_name`, `plan_days`, `plan_duration`, `plan_duration_type`, `plan_price`, `status`) VALUES
(1, 'Basic Plan', 7, '7', '1', '2.00', 1),
(2, 'Premium Plan', 30, '1', '30', '10.00', 1),
(3, 'Platinum Plan', 365, '1', '365', '49.00', 1),
(4, 'Free Plan', 1, '1', '1', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `gateway` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(255) CHARACTER SET latin1 DEFAULT 'User',
  `login_status` int(1) NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `plan_id` int(11) DEFAULT '0',
  `start_date` int(11) DEFAULT NULL,
  `exp_date` int(11) DEFAULT NULL,
  `paypal_payment_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `stripe_payment_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `razorpay_payment_id` varchar(255) DEFAULT NULL,
  `plan_amount` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `login_status`, `name`, `email`, `password`, `phone`, `user_address`, `user_image`, `status`, `plan_id`, `start_date`, `exp_date`, `paypal_payment_id`, `stripe_payment_id`, `razorpay_payment_id`, `plan_amount`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 0, 'Viavi Webtech', 'admin@admin.com', '$2y$10$EMeDkbAwIXJd7fAX0pWF2OZCHmKuGMwtD3ZUjg9HEOMvkaVl.5Xvm', '9227777522', NULL, 'viavi-webtech-1f2416ecff3faba4159de6b399477081-b.jpg', 1, 2, 0, 2592000, NULL, NULL, NULL, '0.00', NULL, 'iZdAfbcKTjezk0NG4xlMKNFdzdxHb9vxDgl9ZWdTzmCI5xQftXCKSg0Ukm3h', '0000-00-00 00:00:00', '2020-03-12 20:46:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads_management`
--
ALTER TABLE `ads_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels_list`
--
ALTER TABLE `channels_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_category`
--
ALTER TABLE `channel_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section`
--
ALTER TABLE `home_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_videos`
--
ALTER TABLE `movie_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `recently_watched`
--
ALTER TABLE `recently_watched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_android_app`
--
ALTER TABLE `settings_android_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_category`
--
ALTER TABLE `sports_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_videos`
--
ALTER TABLE `sports_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads_management`
--
ALTER TABLE `ads_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `channels_list`
--
ALTER TABLE `channels_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `channel_category`
--
ALTER TABLE `channel_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home_section`
--
ALTER TABLE `home_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie_videos`
--
ALTER TABLE `movie_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recently_watched`
--
ALTER TABLE `recently_watched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_android_app`
--
ALTER TABLE `settings_android_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sports_category`
--
ALTER TABLE `sports_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sports_videos`
--
ALTER TABLE `sports_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
 