drop table `gifts`;
CREATE TABLE `gifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(20) not null ,
  `brand` char(20) not null ,
  `name` varchar(255) DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `description` text DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
insert into gifts (brand,code,name,image,description) values ('Bose®','326223-0120','Bose® MIE2 mobile headset','gift1.png','The Bose® MIE2 mobile headset works with most Android™ , Windows® and Blackberry® smartphones to let you take calls with one-touch ease - and enjoy your music with Bose® sound.  StayHear® tips deliver comfort and greater stability');
insert into gifts (brand,code,name,image,description) values ('Bose®','326223-0080','Bose® MIE2i mobile headset','gift2.png','Similar to the Bose® MIE2 mobile headset, but with convenient inline control of volume, track selection and voice applications for select Apple products.');
insert into gifts (brand,code,name,image,description) values ('Bose®','353769-0010','Bose® SIE2i sport headphones','gift3.png','Bose® SIE2i sport headphones deliver a combination of sweat- and weather-resistance, comfortably secure fit and Bose quality sound that conventional sports earbuds can’t match. The exclusive Reebok® fitnessarmband holds your device securely in place. And the inline remote and microphone let you control select Apple products. Available in Orange or Green.');
insert into gifts (brand,code,name,image,description) values ('Bose®','353769-0020','Bose® SIE2i sport headphones','gift4.png','Bose® SIE2i sport headphones deliver a combination of sweat- and weather-resistance, comfortably secure fit and Bose quality sound that conventional sports earbuds can’t match. The exclusive Reebok® fitnessarmband holds your device securely in place. And the inline remote and microphone let you control select Apple products. Available in Orange or Green.');
insert into gifts (brand,code,name,image,description) values ('Bose®','347592-1110','Bose® Bluetooth® headset Series 2 - Right','gift5.png','Hear calls, even as noise levels change, thanks to Bose® proprietary technologies. Noise-rejecting microphone system allows callers to be heard, even when calling from a windy or noisy environment. The flexible StayHear® tip provides comfort and stability, while A2DP streaming delivers audio content. Case included.');
insert into gifts (brand,code,name,image,description) values ('Bose®','345444-0030','Bose® AE2i Audio headphones','gift6.png','With the improved audio performance of Bose® AE2i audio headphones, you can immerse yourself in your music and enjoy convenient control of select Apple® products. Plus, the around-ear fit stays comfortable for hours. The advanced product design and durable materials contribute to lasting quality, while the sleek fold-flat design and convenient carry bag provide for easier storage and transport.');
insert into gifts (brand,code,name,image,description) values ('Bose®','345444-0010','Bose® AE2i Audio headphones','gift7.png','With the improved audio performance of Bose® AE2i audio headphones, you can immerse yourself in your music and enjoy convenient control of select Apple® products. Plus, the around-ear fit stays comfortable for hours. The advanced product design and durable materials contribute to lasting quality, while the sleek fold-flat design and convenient carry bag provide for easier storage and transport.');
insert into gifts (brand,code,name,image,description) values ('Bose®','346019-0010','Bose® OE2i audio headphones - Black','gift8.png','Enjoy music with depth and clarity, and a comfortable on-ear fit. Plus, you can enjoy convenient control of select Apple® products. Contoured headband and a fold-flat, collapsible design for easy portability in the included carrying case.');
insert into gifts (brand,code,name,image,description) values ('Bose®','346019-0030','Bose® OE2i audio headphones - White','gift9.png','Enjoy music with depth and clarity, and a comfortable on-ear fit. Plus, you can enjoy convenient control of select Apple® products. Contoured headband and a fold-flat, collapsible design for easy portability in the included carrying case.');
insert into gifts (brand,code,name,image,description) values ('Bose®','345442-0010','QuietComfort® 15 Acoustic Noise Cancelling® headphones ','gift10.png','The best noise cancelling headphones from Bose. Significant advances in noise reduction make these the quietest Bose® headphones ever. Around-ear style. Additional cable with inline remote and microphone for convenient control of select Apple® products. AAA battery and carrying case included.   *Note: Made for iPhone® 4, iPhone® 3GS, iPod touch® (2nd & 3rd generation), iPod nano® (4th & 5th generation), iPod shuffle (3rd generation), 120GB & 160GB iPod® classic, MacBook® (unibody), MacBook Pro and iPad®.');
insert into gifts (brand,code,name,image,description) values ('Bose®','357550-1300','SoundLink® Bluetooth® Mobile speaker II – Nylon Edition','gift11.png','You’ve got the music on your phone. Now enjoy it with better sound. Flip open your Bose® SoundLink® Bluetooth® Mobile speaker II, make a quick Bluetooth connection, and you’re ready to enjoy clearer, fuller sound than you thought you could get from a speaker this small. It works with any Bluetooth enabled device, while its battery keeps going for hours. And when you’re ready to go, the integrated nylon bi-fold cover protects the speaker in your bag. Share your music everywhere you go, with the SoundLink® Bluetooth® Mobile speaker II.');

