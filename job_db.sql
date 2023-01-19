-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 05:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Science/Medical Science', 'Science Job | The Science Job', 'Science Job Page Of The Science Job.', '1', '2022-06-29 02:49:26', '2022-06-29 02:55:33'),
(2, 'Engineering', 'Engineering Job | The Science Job', 'Engineering Job Page Of The Science Job.', '1', '2022-06-29 02:51:42', '2022-06-29 02:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sports_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `myYaak_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Pending 1=approve 2=reject',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_job`
--

CREATE TABLE `create_job` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multi_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_advertisement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategories` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selection_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laboratory Attendant', '1', '2022-06-29 06:40:33', '2022-06-29 06:40:33'),
(2, 'Laboratory Technician', '1', '2022-06-29 06:41:08', '2022-06-29 06:41:08'),
(3, 'Technical Assistant (TA)', '1', '2022-06-29 06:41:20', '2022-06-29 06:47:06'),
(4, 'Research Assistant (RA)', '1', '2022-06-29 06:41:33', '2022-06-29 06:41:33'),
(5, 'Junior Research Fellow (JRF)', '1', '2022-06-29 06:41:43', '2022-06-29 06:41:43'),
(6, 'Senior Research Fellow (SRF)', '1', '2022-06-29 06:41:52', '2022-06-29 06:41:52'),
(7, 'Postdoctoral Fellow (PDF)', '1', '2022-06-29 06:41:59', '2022-06-29 06:41:59'),
(8, 'Assistant Professor', '1', '2022-06-29 06:42:07', '2022-06-29 06:42:07'),
(9, 'Associate Professor', '1', '2022-06-29 06:42:15', '2022-06-29 06:42:15'),
(10, 'Professor', '1', '2022-06-29 06:42:21', '2022-06-29 06:42:21'),
(11, 'Scientist Positions', '1', '2022-06-29 06:42:29', '2022-06-29 06:42:29'),
(12, 'Group Leader', '1', '2022-06-29 06:42:36', '2022-06-29 06:42:36'),
(13, 'Director', '1', '2022-06-29 06:42:48', '2022-06-29 06:42:48'),
(14, 'Chief Scientific Officer (CSO)', '1', '2022-06-29 06:42:56', '2022-06-29 06:42:56'),
(16, 'Others', '1', '2022-06-29 06:48:39', '2022-06-29 06:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '', 'database', 'default', '{\"uuid\":\"b460b974-6bdb-4b2a-86c6-d2382a877f5a\",\"displayName\":\"App\\\\Jobs\\\\ConvertVideoForDownloading\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ConvertVideoForDownloading\",\"command\":\"O:35:\\\"App\\\\Jobs\\\\ConvertVideoForDownloading\\\":11:{s:5:\\\"video\\\";a:3:{s:17:\\\"compress_filename\\\";s:14:\\\"4315313604.mp4\\\";s:9:\\\"thumbnail\\\";s:14:\\\"4315313604.jpg\\\";s:8:\\\"filename\\\";s:14:\\\"7456268684.mp4\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Symfony\\Component\\Process\\Exception\\ProcessSignaledException: The process has been signaled with signal \"9\". in /home/prizepoolwin/public_html/vendor/symfony/process/Process.php:441\nStack trace:\n#0 /home/prizepoolwin/public_html/vendor/symfony/process/Process.php(254): Symfony\\Component\\Process\\Process->wait()\n#1 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/ProcessRunner.php(64): Symfony\\Component\\Process\\Process->run(Object(Closure))\n#2 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run(Object(Symfony\\Component\\Process\\Process), Object(SplObjectStorage), false)\n#3 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run(Object(Symfony\\Component\\Process\\Process), false, Array)\n#4 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(106): Alchemy\\BinaryDriver\\AbstractBinary->command(Array, false, Array)\n#5 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save(Object(FFMpeg\\Format\\Video\\X264), \'/home/prizepool...\')\n#6 /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo(Object(ProtoneMedia\\LaravelFFMpeg\\FFMpeg\\VideoMedia), \'save\', Array)\n#7 /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(233): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call(\'save\', Array)\n#8 /home/prizepoolwin/public_html/app/Jobs/ConvertVideoForDownloading.php(58): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save(\'public/videos/4...\')\n#9 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\ConvertVideoForDownloading->handle()\n#10 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#15 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#16 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#17 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ConvertVideoForDownloading), false)\n#19 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#20 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#21 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ConvertVideoForDownloading))\n#23 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#35 /home/prizepoolwin/public_html/vendor/symfony/console/Command/Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 /home/prizepoolwin/public_html/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 {main}\n\nNext Alchemy\\BinaryDriver\\Exception\\ExecutionFailureException: ffmpeg failed to execute command \'/usr/bin/ffmpeg\' \'-y\' \'-i\' \'/home/prizepoolwin/public_html/storage/app/public/videos/7456268684.mp4\' \'-threads\' \'12\' \'-vcodec\' \'libx264\' \'-acodec\' \'libfdk_aac\' \'-b:v\' \'400k\' \'-refs\' \'6\' \'-coder\' \'1\' \'-sc_threshold\' \'40\' \'-flags\' \'+loop\' \'-me_range\' \'16\' \'-subq\' \'7\' \'-i_qfactor\' \'0.71\' \'-qcomp\' \'0.6\' \'-qdiff\' \'4\' \'-trellis\' \'1\' \'-b:a\' \'126k\' \'-pass\' \'1\' \'-passlogfile\' \'/tmp/ffmpeg-passes629b302b839ac/pass-629b302b83db0\' \'/home/prizepoolwin/public_html/storage/app/public/videos/4315313604.mp4\':\n\nError Output:\n\n ffmpeg version 2.8.15 Copyright (c) 2000-2018 the FFmpeg developers\n  built with gcc 4.8.5 (GCC) 20150623 (Red Hat 4.8.5-36)\n  configuration: --prefix=/usr --bindir=/usr/bin --datadir=/usr/share/ffmpeg --incdir=/usr/include/ffmpeg --libdir=/usr/lib64 --mandir=/usr/share/man --arch=x86_64 --optflags=\'-O2 -g -pipe -Wall -Wp,-D_FORTIFY_SOURCE=2 -fexceptions -fstack-protector-strong --param=ssp-buffer-size=4 -grecord-gcc-switches -m64 -mtune=generic\' --extra-ldflags=\'-Wl,-z,relro \' --enable-libopencore-amrnb --enable-libopencore-amrwb --enable-libvo-amrwbenc --enable-version3 --enable-bzlib --disable-crystalhd --enable-gnutls --enable-ladspa --enable-libass --enable-libcdio --enable-libdc1394 --enable-libfdk-aac --enable-nonfree --disable-indev=jack --enable-libfreetype --enable-libgsm --enable-libmp3lame --enable-openal --enable-libopenjpeg --enable-libopus --enable-libpulse --enable-libschroedinger --enable-libsoxr --enable-libspeex --enable-libtheora --enable-libvorbis --enable-libv4l2 --enable-libx264 --enable-libx265 --enable-libxvid --enable-x11grab --enable-avfilter --enable-avresample --enable-postproc --enable-pthreads --disable-static --enable-shared --enable-gpl --disable-debug --disable-stripping --shlibdir=/usr/lib64 --enable-runtime-cpudetect\n  libavutil      54. 31.100 / 54. 31.100\n  libavcodec     56. 60.100 / 56. 60.100\n  libavformat    56. 40.101 / 56. 40.101\n  libavdevice    56.  4.100 / 56.  4.100\n  libavfilter     5. 40.101 /  5. 40.101\n  libavresample   2.  1.  0 /  2.  1.  0\n  libswscale      3.  1.101 /  3.  1.101\n  libswresample   1.  2.101 /  1.  2.101\n  libpostproc    53.  3.100 / 53.  3.100\nInput #0, mov,mp4,m4a,3gp,3g2,mj2, from \'/home/prizepoolwin/public_html/storage/app/public/videos/7456268684.mp4\':\n  Metadata:\n    major_brand     : mp42\n    minor_version   : 0\n    compatible_brands: isommp42\n    creation_time   : 2022-01-30 20:52:15\n  Duration: 00:01:15.51, start: 0.000000, bitrate: 1452 kb/s\n    Stream #0:0(und): Video: h264 (High) (avc1 / 0x31637661), yuv420p(tv, bt709), 1280x720 [SAR 1:1 DAR 16:9], 1321 kb/s, 23.98 fps, 23.98 tbr, 24k tbn, 47.95 tbc (default)\n    Metadata:\n      creation_time   : 2022-01-30 20:52:15\n      handler_name    : ISO Media file produced by Google Inc. Created on: 01/30/2022.\n    Stream #0:1(eng): Audio: aac (LC) (mp4a / 0x6134706D), 44100 Hz, stereo, fltp, 127 kb/s (default)\n    Metadata:\n      creation_time   : 2022-01-30 20:52:15\n      handler_name    : ISO Media file produced by Google Inc. Created on: 01/30/2022.\n[libx264 @ 0xf7a700] using SAR=1/1\n[libx264 @ 0xf7a700] using cpu capabilities: MMX2 SSE2Fast SSSE3 SSE4.2 AVX AVX2 FMA3 LZCNT BMI2\n[libx264 @ 0xf7a700] profile Main, level 3.1\n[libx264 @ 0xf7a700] 264 - core 142 r2495 6a301b6 - H.264/MPEG-4 AVC codec - Copyleft 2003-2014 - http://www.videolan.org/x264.html - options: cabac=1 ref=1 deblock=1:0:0 analyse=0x1:0 me=dia subme=2 psy=1 psy_rd=1.00:0.00 mixed_ref=0 me_range=16 chroma_me=1 trellis=0 8x8dct=0 cqm=0 deadzone=21,11 fast_pskip=1 chroma_qp_offset=0 threads=12 lookahead_threads=4 sliced_threads=0 nr=0 decimate=1 interlaced=0 bluray_compat=0 constrained_intra=0 bframes=3 b_pyramid=2 b_adapt=1 b_bias=0 direct=1 weightb=1 open_gop=0 weightp=2 keyint=250 keyint_min=23 scenecut=40 intra_refresh=0 rc_lookahead=40 rc=abr mbtree=1 bitrate=400 ratetol=1.0 qcomp=0.60 qpmin=0 qpmax=69 qpstep=4 ip_ratio=1.41 aq=1:1.00\nOutput #0, mp4, to \'/home/prizepoolwin/public_html/storage/app/public/videos/4315313604.mp4\':\n  Metadata:\n    major_brand     : mp42\n    minor_version   : 0\n    compatible_brands: isommp42\n    encoder         : Lavf56.40.101\n    Stream #0:0(und): Video: h264 (libx264) ([33][0][0][0] / 0x0021), yuv420p, 1280x720 [SAR 1:1 DAR 16:9], q=-1--1, pass 1, 400 kb/s, 23.98 fps, 24k tbn, 23.98 tbc (default)\n    Metadata:\n      creation_time   : 2022-01-30 20:52:15\n      handler_name    : ISO Media file produced by Google Inc. Created on: 01/30/2022.\n      encoder         : Lavc56.60.100 libx264\n    Stream #0:1(eng): Audio: aac (libfdk_aac) ([64][0][0][0] / 0x0040), 44100 Hz, stereo, s16, 126 kb/s (default)\n    Metadata:\n      creation_time   : 2022-01-30 20:52:15\n      handler_name    : ISO Media file produced by Google Inc. Created on: 01/30/2022.\n      encoder         : Lavc56.60.100 libfdk_aac\nStream mapping:\n  Stream #0:0 -> #0:0 (h264 (native) -> h264 (libx264))\n  Stream #0:1 -> #0:1 (aac (native) -> aac (libfdk_aac))\nPress [q] to stop, [?] for help\nframe=   57 fps=0.0 q=41.0 size=       6kB time=00:00:02.29 bitrate=  20.7kbits/s    \rframe=   91 fps= 89 q=38.0 size=      76kB time=00:00:03.62 bitrate= 172.8kbits/s    \rframe=  144 fps= 94 q=35.0 size=     216kB time=00:00:05.94 bitrate= 297.3kbits/s    \rframe=  184 fps= 90 q=40.0 size=     387kB time=00:00:07.36 bitrate= 430.5kbits/s    \rframe=  217 fps= 85 q=41.0 size=     492kB time=00:00:08.75 bitrate= 460.2kbits/s    \rframe=  244 fps= 73 q=40.0 size=     540kB time=00:00:10.12 bitrate= 436.8kbits/s    \rframe=  246 fps= 54 q=40.0 size=     542kB time=00:00:10.12 bitrate= 438.9kbits/s    \rframe=  247 fps= 44 q=39.0 size=     543kB time=00:00:10.12 bitrate= 439.7kbits/s    \rframe=  258 fps= 42 q=39.0 size=     557kB time=00:00:10.58 bitrate= 431.0kbits/s    \rframe=  266 fps= 40 q=38.0 size=     567kB time=00:00:11.05 bitrate= 420.6kbits/s    \rframe=  270 fps= 37 q=38.0 size=     574kB time=00:00:11.05 bitrate= 425.1kbits/s    \rframe=  272 fps= 35 q=38.0 size=     575kB time=00:00:11.12 bitrate= 423.7kbits/s    \rframe=  272 fps= 31 q=38.0 size=     575kB time=00:00:11.16 bitrate= 422.0kbits/s    \rframe=  272 fps= 27 q=38.0 size=     575kB time=00:00:11.19 bitrate= 421.1kbits/s    \r in /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/ProcessRunner.php:94\nStack trace:\n#0 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/ProcessRunner.php(67): Alchemy\\BinaryDriver\\ProcessRunner->doExecutionFailure(\'\'/usr/bin/ffmpe...\', \'ffmpeg version ...\', Object(Symfony\\Component\\Process\\Exception\\ProcessSignaledException))\n#1 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run(Object(Symfony\\Component\\Process\\Process), Object(SplObjectStorage), false)\n#2 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run(Object(Symfony\\Component\\Process\\Process), false, Array)\n#3 /home/prizepoolwin/public_html/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(106): Alchemy\\BinaryDriver\\AbstractBinary->command(Array, false, Array)\n#4 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save(Object(FFMpeg\\Format\\Video\\X264), \'/home/prizepool...\')\n#5 /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo(Object(ProtoneMedia\\LaravelFFMpeg\\FFMpeg\\VideoMedia), \'save\', Array)\n#6 /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(233): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call(\'save\', Array)\n#7 /home/prizepoolwin/public_html/app/Jobs/ConvertVideoForDownloading.php(58): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save(\'public/videos/4...\')\n#8 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\ConvertVideoForDownloading->handle()\n#9 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#11 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#12 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#13 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#14 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#15 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#16 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#17 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ConvertVideoForDownloading), false)\n#18 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#19 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#20 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ConvertVideoForDownloading))\n#22 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#23 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#24 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#25 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#28 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#29 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#30 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#31 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#32 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#33 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#34 /home/prizepoolwin/public_html/vendor/symfony/console/Command/Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 /home/prizepoolwin/public_html/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 {main}\n\nNext ProtoneMedia\\LaravelFFMpeg\\Exporters\\EncodingException: Encoding failed in /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Exporters/EncodingException.php:12\nStack trace:\n#0 /home/prizepoolwin/public_html/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(237): ProtoneMedia\\LaravelFFMpeg\\Exporters\\EncodingException::decorate(Object(FFMpeg\\Exception\\RuntimeException))\n#1 /home/prizepoolwin/public_html/app/Jobs/ConvertVideoForDownloading.php(58): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save(\'public/videos/4...\')\n#2 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\ConvertVideoForDownloading->handle()\n#3 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#9 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#10 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ConvertVideoForDownloading), false)\n#12 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#13 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ConvertVideoForDownloading))\n#14 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ConvertVideoForDownloading))\n#16 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#28 /home/prizepoolwin/public_html/vendor/symfony/console/Command/Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(1024): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /home/prizepoolwin/public_html/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Console/Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /home/prizepoolwin/public_html/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /home/prizepoolwin/public_html/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 {main}', '2022-06-04 00:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `form_details`
--

CREATE TABLE `form_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_details`
--

INSERT INTO `form_details` (`id`, `name`, `use`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'POSTING JOB', 'Job Posting From', 'Posting Job | The Science Job', 'Job Posting Page.', 'Job Post Form, The Science Job,', '1', '2022-07-14 12:10:25', '2022-07-15 23:42:21'),
(2, 'REGISTER AS JOB-SEEKER', 'Job Seeker Registration Form', 'Register As Job-Seeker | The Science Job', 'Job Registration Page for Job Seekers.', 'Job Registration Form, The Science Job,', '1', '2022-07-14 12:12:41', '2022-07-15 23:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `form_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `form_label`, `field_type`, `field_name`, `field_id`, `placeholder`, `required`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Full Name', 'text', 'name', 'name', 'Full Name', '1', '1', '2022-07-14 16:42:44', '2022-07-15 02:46:40'),
(2, 2, 'Email', 'email', 'email', 'email', 'Email', '1', '1', '2022-07-14 16:43:28', '2022-07-14 16:43:28'),
(3, 2, 'Mobile Number', 'number', 'phone', 'phone', 'Mobile Number', '1', '1', '2022-07-14 16:43:51', '2022-07-14 16:43:51'),
(4, 2, 'Any Other Mobile Number', 'number', 'o_phone', 'o_phone', 'Other Mobile Number', '0', '1', '2022-07-14 16:45:47', '2022-07-14 16:45:47'),
(5, 2, 'Registration Number/Id', 'text', 'registration_id', 'registration_id', 'Registration number/Id', '1', '1', '2022-07-14 16:46:19', '2022-07-14 16:46:19'),
(6, 2, 'Photograph (attachment)', 'file', 'image', 'image', 'Photo', '1', '1', '2022-07-14 16:46:43', '2022-07-14 16:46:43'),
(7, 2, 'CV (attachment)', 'file', 'resume', 'resume', 'Resume', '1', '1', '2022-07-14 16:47:14', '2022-07-14 16:47:14'),
(8, 2, 'Details of the present employment', 'text', 'last_work', 'last_work', 'Details of the present employment', '1', '1', '2022-07-14 16:47:44', '2022-07-14 16:47:44'),
(9, 2, 'Designation', 'text', 'designation', 'designation', 'Designation', '1', '0', '2022-07-14 16:48:09', '2022-07-14 16:48:09'),
(10, 2, 'Salary', 'text', 'salary', 'salary', 'Salary', '1', '1', '2022-07-14 16:48:32', '2022-07-14 16:48:32'),
(11, 2, 'Address', 'text', 'address', 'address', 'Address', '1', '1', '2022-07-14 16:49:00', '2022-07-14 16:49:00'),
(12, 2, 'PIN/ZIP Code', 'number', 'zip_code', 'zip_code', 'PIN/ZIP Code', '1', '1', '2022-07-14 16:49:17', '2022-07-19 07:08:12'),
(13, 2, 'City', 'text', 'city', 'city', 'City', '1', '1', '2022-07-14 16:50:06', '2022-07-14 16:50:06'),
(14, 2, 'State', 'select', 'state', 'state', 'Select State', '1', '1', '2022-07-14 16:50:36', '2022-07-16 00:09:19'),
(15, 2, 'Expectations for the job', 'text', 'expectations', 'expectations', 'Expectations for the job', '0', '1', '2022-07-14 16:51:02', '2022-07-14 16:51:02'),
(16, 2, 'Remarks', 'text', 'remarks', 'remarks', 'Remarks, If Any', '0', '1', '2022-07-14 16:51:33', '2022-07-14 16:51:33'),
(17, 2, 'Categories', 'select', 'categories', 'categories', 'Selection of job by subject of research/specialisation', '1', '1', '2022-07-14 16:51:58', '2022-07-15 23:51:07'),
(18, 2, 'Subcategories', 'select', 'subcategories', 'subcategories', 'In Science/Medical Sciences', '1', '1', '2022-07-14 16:52:20', '2022-07-15 23:51:56'),
(19, 2, 'Selection of job by Designation', 'select', 'selection_job', 'selection_job', 'Select job by Designation', '1', '1', '2022-07-14 16:52:47', '2022-07-15 23:52:09'),
(21, 1, 'Full Name', 'text', 'name', 'name', 'Full Name', '1', '1', '2022-07-14 17:02:21', '2022-07-20 05:21:47'),
(22, 1, 'Email', 'email', 'email', 'email', 'Email', '1', '1', '2022-07-14 17:02:44', '2022-07-14 17:02:44'),
(23, 1, 'Mobile Number', 'number', 'phone', 'phone', 'Mobile Number', '1', '1', '2022-07-14 17:03:03', '2022-07-14 17:03:03'),
(24, 1, 'Any Other Mobile Number', 'number', 'o_phone', 'o_phone', 'Other Mobile Number', '0', '1', '2022-07-14 17:03:30', '2022-07-14 17:03:30'),
(25, 1, 'Institute/University/Organization', 'text', 'organization', 'organization', 'Institute/University/Organization', '1', '1', '2022-07-14 17:04:25', '2022-07-14 17:04:25'),
(26, 1, 'Postal Address', 'text', 'postal_address', 'postal_address', 'Postal Address', '1', '1', '2022-07-14 17:04:55', '2022-07-14 17:04:55'),
(27, 1, 'Website', 'text', 'website', 'website', 'Website', '0', '1', '2022-07-14 17:05:42', '2022-07-14 17:05:42'),
(28, 1, 'Location for which position has been advertised', 'text', 'multi_location', 'multi_location', 'Location for which position has been advertised', '0', '1', '2022-07-14 17:06:06', '2022-07-14 17:06:06'),
(29, 1, 'Expectations for the advertised position', 'text', 'expectations', 'expectations', 'Expectations for the advertised position', '1', '1', '2022-07-14 17:06:25', '2022-07-14 17:06:25'),
(30, 1, 'Copy of the advertisement', 'file', 'copy_advertisement', 'copy_advertisement', 'Copy of the advertisement', '0', '1', '2022-07-14 17:06:57', '2022-07-14 17:06:57'),
(31, 1, 'Remarks', 'text', 'remarks', 'remarks', 'Remarks if any', '0', '1', '2022-07-14 17:07:22', '2022-07-14 17:07:22'),
(32, 1, 'Categories', 'select', 'categories', 'categories', 'Selection of job by subject of research/specialisation', '1', '1', '2022-07-14 17:07:48', '2022-07-15 22:55:20'),
(33, 1, 'Subcategories', 'select', 'subcategories', 'subcategories', 'In Science/Medical Sciences', '1', '1', '2022-07-14 17:08:15', '2022-07-15 22:55:31'),
(34, 1, 'Selection of job by Designation', 'select', 'selection_job', 'selection_job', 'Select job by Designation', '1', '1', '2022-07-14 17:08:43', '2022-07-15 22:56:02'),
(36, 1, 'Registration number/Id for this site', 'text', 'registration_id', 'registration_id', 'Registration number/Id', '1', '1', '2022-07-15 03:56:25', '2022-07-15 22:33:42'),
(38, 1, 'test', 'text', 'test', 'test', 'test', '0', '0', '2022-07-19 07:01:14', '2022-07-19 07:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contest_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `contest_id`, `image`, `feature`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '3690181528.jpg', '0', NULL, NULL, '2022-05-10 01:10:03', '2022-05-10 01:10:03'),
(2, '2', '7883980591.jpg', '0', NULL, NULL, '2022-05-10 01:10:05', '2022-05-10 01:10:05'),
(3, '2', '8392885048.jpg', '0', NULL, NULL, '2022-05-10 01:10:08', '2022-05-10 01:10:08'),
(5, '3', '6002027010.jpeg', '0', NULL, NULL, '2022-05-10 01:18:06', '2022-05-10 01:18:06'),
(6, '3', '8899511491.jpg', '0', NULL, NULL, '2022-05-10 01:18:09', '2022-05-10 01:18:09'),
(7, '3', '8483343542.jpg', '0', NULL, NULL, '2022-05-10 01:18:14', '2022-05-10 01:18:14'),
(28, '11', '7803503788.jpg', '0', NULL, NULL, '2022-05-10 02:02:36', '2022-05-10 02:02:36'),
(29, '11', '4012407226.jpg', '0', NULL, NULL, '2022-05-10 02:02:48', '2022-05-10 02:02:48'),
(30, '11', '551649657.jpg', '0', NULL, NULL, '2022-05-10 02:02:55', '2022-05-10 02:02:55'),
(31, '12', '2656949972.jpg', '0', NULL, NULL, '2022-05-10 02:08:22', '2022-05-10 02:08:22'),
(32, '12', '7208566583.jpg', '0', NULL, NULL, '2022-05-10 02:08:35', '2022-05-10 02:08:35'),
(33, '12', '1627358965.jpeg', '0', NULL, NULL, '2022-05-10 02:08:42', '2022-05-10 02:08:42'),
(34, '13', '4589068772.jpeg', '0', NULL, NULL, '2022-05-10 02:11:30', '2022-05-10 02:11:30'),
(35, '13', '8932247617.jpeg', '0', NULL, NULL, '2022-05-10 02:11:34', '2022-05-10 02:11:34'),
(36, '13', '6762877421.jpg', '0', NULL, NULL, '2022-05-10 02:11:46', '2022-05-10 02:11:46'),
(46, '11', '1600931284.jpg', '0', NULL, NULL, '2022-05-15 19:57:39', '2022-05-15 19:57:39'),
(61, '16', '8193067760.jpg', '0', NULL, NULL, '2022-05-18 20:40:19', '2022-05-18 20:40:19'),
(62, '16', '9146990871.jpg', '0', NULL, NULL, '2022-05-18 20:40:32', '2022-05-18 20:40:32'),
(63, '16', '3436967711.jpg', '0', NULL, NULL, '2022-05-18 20:40:43', '2022-05-18 20:40:43'),
(64, '15', '5175551259.jpg', '0', NULL, NULL, '2022-05-18 21:06:38', '2022-05-18 21:06:38'),
(65, '15', '7962170193.jpg', '0', NULL, NULL, '2022-05-18 21:06:51', '2022-05-18 21:06:51'),
(66, '15', '2457071496.jpg', '0', NULL, NULL, '2022-05-18 21:08:46', '2022-05-18 21:08:46'),
(67, '14', '3446132217.jpg', '0', NULL, NULL, '2022-05-18 21:49:22', '2022-05-18 21:49:22'),
(68, '14', '2169652419.jpg', '0', NULL, NULL, '2022-05-18 21:49:33', '2022-05-18 21:49:33'),
(69, '14', '6008745231.jpg', '0', NULL, NULL, '2022-05-18 21:49:48', '2022-05-18 21:49:48'),
(73, '17', '5611090432.jpg', '0', NULL, NULL, '2022-05-18 23:21:25', '2022-05-18 23:21:25'),
(74, '17', '1021701924.jpg', '0', NULL, NULL, '2022-05-18 23:21:39', '2022-05-18 23:21:39'),
(75, '17', '761419832.jpg', '0', NULL, NULL, '2022-05-18 23:21:50', '2022-05-18 23:21:50'),
(76, '18', '5065323326.jpeg', '0', NULL, NULL, '2022-06-02 21:25:36', '2022-06-02 21:26:00'),
(77, '18', '3105087932.jpg', '0', NULL, NULL, '2022-06-02 21:25:42', '2022-06-02 21:26:00'),
(78, '18', '3276102330.jpg', '0', NULL, NULL, '2022-06-02 21:25:58', '2022-06-02 21:26:00'),
(82, '19', '4820349635.jpg', '0', NULL, NULL, '2022-06-04 22:04:10', '2022-06-04 22:04:10'),
(83, '19', '9084280128.jpg', '0', NULL, NULL, '2022-06-04 22:04:22', '2022-06-04 22:04:22'),
(84, '19', '5456623197.jpg', '0', NULL, NULL, '2022-06-04 22:04:32', '2022-06-04 22:04:32'),
(88, '20', '1638335892.jpg', '0', NULL, NULL, '2022-06-05 18:45:04', '2022-06-05 18:45:04'),
(89, '20', '9451356079.jpg', '0', NULL, NULL, '2022-06-05 18:45:05', '2022-06-05 18:45:05'),
(90, '20', '231736906.jpg', '0', NULL, NULL, '2022-06-05 18:45:07', '2022-06-05 18:45:07'),
(95, '21', '8713809721.jpg', '0', NULL, NULL, '2022-06-05 22:10:05', '2022-06-05 22:10:05'),
(96, '21', '6027674506.jpg', '0', NULL, NULL, '2022-06-05 22:10:07', '2022-06-05 22:10:07'),
(97, '21', '4563955849.jpg', '0', NULL, NULL, '2022-06-05 22:10:10', '2022-06-05 22:10:10'),
(112, '22', '9422690622.jpg', '0', NULL, NULL, '2022-06-07 22:08:23', '2022-06-07 22:08:23'),
(113, '22', '1937982251.jpg', '0', NULL, NULL, '2022-06-07 22:08:25', '2022-06-07 22:08:25'),
(114, '22', '5244915919.jpg', '0', NULL, NULL, '2022-06-07 22:08:27', '2022-06-07 22:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Match Key',
  `team_a` bigint(20) UNSIGNED DEFAULT NULL,
  `team_b` bigint(20) UNSIGNED DEFAULT NULL,
  `match_date` datetime DEFAULT NULL,
  `league_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vanue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toss_winner` int(11) DEFAULT NULL COMMENT 'Match Key',
  `electorate` int(11) DEFAULT NULL COMMENT '1=Batting 2=Bowling',
  `progress_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Not Started, 1=In Progress, 2=Finished',
  `match_steps` int(11) NOT NULL DEFAULT 0 COMMENT '0=Create Match 1=Team Assign 2=Captain Assign 3=Match Board 4=Done',
  `total_overs` int(11) NOT NULL DEFAULT 0 COMMENT 'Total Overs',
  `current_over` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `current_ball` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games_commetnries`
--

CREATE TABLE `games_commetnries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Text 2=File',
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Pending 1=approve 2=reject',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `title`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</strong></h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', 'Terms & Conditions | The Science Jobs', 'Terms and Condition of The Science Jobs.', 'Terms and Condition of The Science Jobs, The Science Jobs', '2022-04-19 02:51:44', '2022-06-23 00:34:59'),
(2, 'Privacy Policy', '<p><strong>Privacy Statement</strong><br />\r\nWe care about your privacy and are committed to protecting your personal data. This privacy statement will inform you how we handle your personal data, your privacy rights and how the law protects you. Please read this privacy statement carefully before using our Services.</p>\r\n\r\n<p><strong>Contents</strong></p>\r\n\r\n<ol>\r\n	<li>Who are we?</li>\r\n	<li>What data do we collect about you?</li>\r\n	<li>Why do we process your personal information?</li>\r\n	<li>How will we inform you about changes in our privacy statement?</li>\r\n	<li>Communication</li>\r\n	<li>Who do we share your data with?</li>\r\n	<li>Where do we store your data and for how long?</li>\r\n	<li>Technical and organizational measures and processing security</li>\r\n	<li>Links to third-party websites</li>\r\n</ol>\r\n\r\n<p><br />\r\nThis privacy statement applies to your use of any products, services, content, features, technologies, or functions, and all related websites, mobile apps, mobile sites or other online platforms or applications offered to you by us (JobPro platforms).</p>\r\n\r\n<h3><strong>1. &nbsp;&nbsp;Who are we?</strong></h3>\r\n\r\n<p>Jobpro (www.thesciencejobs.in) is a service platform owned and launched by&nbsp;<em><strong>TechnoConcept India Pvt Ltd</strong></em>&nbsp;based at New Delhi - 110003 (India),&nbsp;a&nbsp;company incorporated and registered in India, is the data controller for the personal data collected through this Platform.</p>\r\n\r\n<h3><strong>2.&nbsp;What data do we collect about you?</strong></h3>\r\n\r\n<p><strong>2.1.</strong> &nbsp;&nbsp;When you register to use our Services, we may collect the following information about you :</p>\r\n\r\n<ul>\r\n	<li>If you register using your email address: first name, last name, mobile number (optional) and email address;</li>\r\n	<li>If you register using your mobile number we collect your mobile number (Option will be available in future).&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong><em>Validation of your account</em></strong></p>\r\n\r\n<p>We validate the accounts of our platform&nbsp;users by using email verification to ensure that each account is associated with a real and unique user. This validation process is initiated once you proceed with sign up using your email address. In order to validate your JobPro&nbsp;account before posting your listing, we will send you a link on the valid email address provided by you. This process is entirely free of charge. If you do not agree to validate your account, then your account will remain inactive and you<br />\r\nwon&rsquo;t be able to use our services. Once you have validated your&nbsp;account, it will remain associated with the email address&nbsp;used for the verification. If you wish to change the email address&nbsp;&nbsp;associated with your&nbsp;account, you will need to create a fresh account with the new email address or contact our Customer Support.</p>\r\n\r\n<p><em>Taking part in our user surveys</em></p>\r\n\r\n<p>We will occasionally provide you with our user surveys in order to measure your overall satisfaction with the quality of our Services. For this purpose,&nbsp;you may choose to provide us with your contact details such as your email and your mobile number upon our request to contact you and invite you to attend one of our user experience surveys. Please be aware that the information you give us in relation to our survey questions may occasionally contain personal data as voluntarily provided by you in your answers.</p>\r\n\r\n<p><strong>2.2</strong> Data we collect automatically when you use our Services :</p>\r\n\r\n<p>When you work on our platform, we automatically collect the following information about you :</p>\r\n\r\n<p><em>Device Information</em><br />\r\nWe may collect device-specific information such as operating system version, unique identifiers, the name of the mobile network that you are using. We associate the device identifiers with your JobPro&nbsp;account.<br />\r\n<em>Location information</em><br />\r\nDepending on your device permissions, if you post an item on our platform, we automatically collect and process information about your actual location. We use various technologies to determine location, including IP address, GPS, Wi-Fi access points and mobile towers etc as and when feasible. Your location data allows you to collect your location-specific services and provide you a better, relevant and location-specific targeted experience. Photo gallery access can also be provided by you as an option if you wish.<br />\r\n<em>Client and Log data</em><br />\r\nWe obtain technical details including the Internet Protocol (IP) address of your device, time zone and operating system. We will also store your login information (registration date, date of last password change, date of the last successful login), type and version of your browser etc.&nbsp;<br />\r\n<em>Cookies and Similar Technologies</em><br />\r\nWe use cookies to manage our users&rsquo; sessions. &quot;Cookies&quot; are small text files transferred from a web server to the hard drive of your device. Cookies may be used to collect the your username, date and time of your visit to our platform, your browsing history and your preferences. You can set your browser to refuse all or some cookies or to alert you when websites set or access cookies. If you disable or refuse cookies, please note that some parts of our services/website&nbsp;may become inaccessible or not function properly. For more information on the cookies we use, please see our Policy on Cookies.</p>\r\n\r\n<h3><strong>3. Why do we process your personal information?</strong></h3>\r\n\r\n<p>We will only use your personal data when the law allows us to. Most commonly, we will use your personal data in the following circumstances :</p>\r\n\r\n<ul>\r\n	<li>Where we need to carry out the contract we are about to enter into or have entered into with you.</li>\r\n	<li>Where it is necessary for our legitimate interests to improve our services and to provide you a safe and secure platform.</li>\r\n	<li>Where we need to comply with a legal or regulatory obligation.</li>\r\n	<li>In certain circumstances, we may also process your personal data based on your consent. If we do this, we will let you know the purpose and the category of personal data to be processed at the time we seek your consent.</li>\r\n</ul>\r\n\r\n<p>We have set out below a description of the reasons for which we use your personal data.</p>\r\n\r\n<p><strong>3.1. For providing access and delivering services through our website.</strong></p>\r\n\r\n<p><strong>3.1.1.</strong> If you log in using your mobile number or email ID, we use your first name and last name, mobile number and/or e-mail address to identify you as a user and provide access to our platform.</p>\r\n\r\n<p><strong>3.1.2.</strong> We use third party payment service providers to process any payment you make to our services. Depending on the method of payment, you may be requested to provide us with your payment and credit card details which we will then provide to the payment service provider in order to process your payment. We do not store your credit card information unless you choose the option to save such information in order to make recurring payments easier without having to re-enter your details each time. In such cases, we only store your cardholder name, the card expiry date, your card type and the last four digits of the card number. We do not store any credit card code verification values and merely forward such values and your credit card number in an encrypted manner for the purpose of processing your payment by our payment service provider.</p>\r\n\r\n<p>We process the above information for the adequate performance of our contract with you.</p>\r\n\r\n<p><strong>3.2.&nbsp;&nbsp;For improving your experience on the platform and developing new functionalities of the website.</strong></p>\r\n\r\n<p>With the help of your account information, which includes your email ID and/or phone number, we map the different devices (such as desktop, mobile, tablets) used by you to access our Platform. This allows us to associate your activity on our website/platform across devices and helps us in providing you a seamless experience no matter which device you use.</p>\r\n\r\n<p><strong>3.3. To take your feedback, promote and offer you services that may be of your interest.</strong></p>\r\n\r\n<p><strong>3.3.1.</strong> We use your mobile number, log data and unique device identifiers to administer and protect our Platform (including&nbsp;troubleshooting, data analysis, testing, fraud prevention, system maintenance, support, reporting and hosting of data).<br />\r\n<strong>3.3.2.</strong> We access and analyse your peer to &nbsp;peer chat messages with other users conducted through the chat function on our services for customer satisfaction, safety and for fraud prevention (e.g. to block spam or abusive messages that may have been sent to you by other users). &nbsp;During the analysis and observation, we are de-identifying chat content as much as possible by anonymizing the unique identification values assigned to users. However, there may still be cases beyond our control in which the chat content may show certain personal data that you have chosen to provide. Only in limited cases and circumstances, our customer safety and security specialists review chat content manually, for example, if we have strong indications leading to the urgent suspicion of fraudulent activities. In these circumstances, highly restrictive access rights apply to selected customer safety and security specialists analysing the chat content.&nbsp;<br />\r\n<strong>3.3.3.</strong> We might ban certain user accounts to prevent fraud on our services.&nbsp;Indication of a fraudulent user based on certain information such as user activity and posted content may lead us to this decision of blocking the particular user.&nbsp;Human review takes place by selecting customer safety and security specialists on the basis of highly restrictive access rights. We use this form of decision-making on the basis of our legitimate interest to detect and prevent fraud and to keep our services safe and secure for our users. If you think that your account was wrongfully banned, you can contact our Customer Support team, in which case our team will review their decision to ban your account.&nbsp;<br />\r\n<strong>3.3.4.</strong> We collect certain information from and in relation to the electronic device from which you are accessing our Services on the basis of our legitimate interest in preventing fraud on our Services. The information we collect includes your user ID (depending on whether you are logged in),&nbsp;country domain, IP address, device language settings, device brand and type, device operating system and version, browser type and version, and device-specific software information such as fonts, system and browser, time zone and available video and audio formats. The device related information is used to determine whether the same device is being used when users interact with our services. We associate such information with a user fraud score on the basis of which we may ban certain users. If you think that your account was wrongfully banned, you can contact us through our customer support helpline in which case our team will review the decision to ban your account.</p>\r\n\r\n<p>To take your feedback, promote and offer you services that may be of your interest</p>\r\n\r\n<ol>\r\n	<li>We may contact you through your registered mobile number or email ID in order to take feedback from you about our services.</li>\r\n	<li>We use your email address and mobile number (by SMS) to make suggestions and recommendations to you about our services that may be of interest to you.</li>\r\n	<li>If you choose to provide us with your location data, we may use your location data to measure and monitor your interaction with the third-party advertisement banners we place on our Services.</li>\r\n</ol>\r\n\r\n<p>We process the above information based on our legitimate interest in undertaking marketing activities to offer you Services that may be of your interest. Specifically, you may receive certain marketing communications from us :<br />\r\nBy any preferred means of communication if you have requested such information from us.<br />\r\nBy email or phone, regarding similar products and services, if you already use our Services or acquired some of our products.<br />\r\nBy phone or email, if you provided us with your details when you entered a competition; or By phone or email if you registered for a promotion.&nbsp;<br />\r\nBy phone or email, if you have provided your feedback for our Services through our Platform, social media, or any other means.</p>\r\n\r\n<p>Being a registered user on our Platform, please note that if you have registered yourself on DND/DNC/NCPR services, you will still receive the above communications.<br />\r\nYou can ask us to stop sending you such marketing communication at any time by clicking on the opt-out link in the email sent to you or by changing your notification settings in your account or by stating our calling agent that you do not wish to be contacted for the above marketing communications.</p>\r\n\r\n<h3><strong>4.&nbsp;How will we inform you about changes in our privacy statement?</strong></h3>\r\n\r\n<p>We may amend and update this privacy statement from time to time. We will notify you of material changes to this privacy statement as appropriate under the circumstances and as required by applicable laws, either by placing a prominent notice within our services or by sending you a message via our services or by sending you an email. If you do not agree with the way we are processing your personal data and the choices we are providing to you, you may close your account at any time by going into your account settings and select delete account.</p>\r\n\r\n<h3><strong>5. Communication</strong></h3>\r\n\r\n<p>We will communicate with you by email or&nbsp;SMS &nbsp;connection with our services/website&nbsp;to confirm your registration, to inform you in case your ad listing/job listing has become live/expired and other transactional messages in relation to our services. As it is imperative for us to provide you such transactional messages you may not be able to opt-out of such messages.</p>\r\n\r\n<h3><strong>6. Who do we share your data with?</strong></h3>\r\n\r\n<p>We may have to share your personal data with the parties set out below for the purposes set<br />\r\nout in section 3 above.<br />\r\n<strong>Corporate affiliates :</strong> We may share your data with our group companies, which are located within as well as outside India and help us in providing business operation services such as product enhancements, customer support and fraud detection mechanisms.<br />\r\n<strong>Third Party Service Providers :</strong>&nbsp;&nbsp;We use third party service providers to help us deliver certain aspect of our services for example, cloud storage facilities, website development, digital marketing and so on.<br />\r\nWe conduct checks on our third-party service providers and require them to respect the security of your personal data and to treat it in accordance with the law. We do not allow them to use your personal data for their own purposes and only permit them to process your personal data for specified purposes and in accordance with our instructions.<br />\r\n<strong>Advertising and analytics providers :</strong> In order to improve our services, we will sometimes share your non-identifiable information with analytics providers that help us analyse how people are using our platform/service. We share your information with them in non- identifiable form for monitoring and reporting the effectiveness of the campaign delivery to our business partners and for internal business analysis.<br />\r\n<strong>Law enforcement authorities, regulators and others :</strong> We may disclose your personal data to law enforcement authorities, regulators, governmental or public bodies and other relevant third parties to comply with any legal or regulatory requirements.</p>\r\n\r\n<p>We may choose to sell, transfer, or merge parts of our business or our assets. Alternatively, we may seek to acquire other businesses or merge with them. If a change happens to our&nbsp;business, then the new owners may use your personal data in the same way as set out in this privacy statement.</p>\r\n\r\n<p><strong>Publicly available information :</strong> When you post any information regarding jobs using our Services, you may choose to make certain personal information visible to other&nbsp;users. This may include your first name, last name, your email address, your location and your contact number. Please note, any information you provide to other users can always be shared by them with others so please exercise discretion in this respect.</p>\r\n\r\n<h3><strong>7. Where do we store your data and for how long?</strong></h3>\r\n\r\n<p>The data we collect about you will be stored and processed in secured servers in order to provide the best possible user experience.&nbsp;<br />\r\nWe will only retain your personal data for as long as necessary to fulfil the purposes we collected it for, including for the purposes of satisfying any legal, accounting, or reporting requirements.<br />\r\nTo determine the appropriate retention period for personal data, we consider the amount, nature, and sensitivity of the personal data, the potential risk of harm from unauthorized use or disclosure of your personal data, the purposes for which we process your personal data and whether we can achieve those purposes through other means, and the applicable legal requirements.</p>\r\n\r\n<p><strong>8. Technical and organizational measures and processing security</strong></p>\r\n\r\n<p>All the information we receive about you are stored on secure servers and we have implemented technical and organizational measures that are suitable and necessary to protect your personal data. JobPro&nbsp;continually evaluates the security of its network and adequacy of its internal information security program, which is designed to (a) help secure your data against accidental or unlawful loss, access or disclosure, (b) identify reasonably foreseeable risks to the security of the JobPro&nbsp;network, and (c) minimize security risks, including through risk assessment and regular testing. In addition, we ensure that all payment data are encrypted using SSL technology.<br />\r\nPlease note, despite the measures we have implemented to protect your data, the transfer of data through the Internet or other open networks is never completely secure and there is a risk that your personal data may be accessed by unauthorized third parties.</p>\r\n\r\n<h3><strong>9. Links to third-party websites</strong></h3>\r\n\r\n<p>Our Platform may contain links to third-party third party websites or apps. If you click on one of these links, please note that each one will have its own privacy policy. We do not control these websites / apps and are not responsible for those policies. When you leave our Platform, we encourage you to read the privacy notice of every website you visit.<br />\r\nCCPA Privacy Rights (Do Not Sell My Personal Information)</p>\r\n\r\n<p><strong>Under the CCPA, among other rights, California consumers have the right to :</strong></p>\r\n\r\n<ul>\r\n	<li>Request that a business that collects a consumer&#39;s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</li>\r\n	<li>Request that a business delete any personal data about the consumer that a business has collected.</li>\r\n	<li>Request that a business that sells a consumer&#39;s personal data, not sell the consumer&amp;&nbsp;personal data.</li>\r\n	<li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li>\r\n</ul>\r\n\r\n<p><strong>GDPR Data Protection Rights</strong></p>\r\n\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following :</p>\r\n\r\n<ul>\r\n	<li>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</li>\r\n	<li>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</li>\r\n	<li>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</li>\r\n	<li>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</li>\r\n	<li>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</li>\r\n	<li>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</li>\r\n	<li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li>\r\n</ul>\r\n\r\n<p><strong>Childrens&nbsp;Information</strong></p>\r\n\r\n<ul>\r\n	<li>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</li>\r\n	<li>JobPro does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</li>\r\n</ul>\r\n\r\n<p>This Privacy Policy version is <strong>2022-1.0</strong></p>\r\n\r\n<p>In case you want to contact us with regard to our privacy policy, you may email us at&nbsp;customer.care@olabx.com&nbsp;with subject line &quot;Privacy Policy&quot;.</p>', 'Privacy Policy | The Science Jobs', 'Privacy Policy of The Science Jobs', 'Privacy Policy of The Science Jobs, The Science Jobs,', '2022-04-19 02:53:24', '2022-06-23 00:40:16'),
(5, 'Home Page Banner Text', '<h1>Do you have a great smile, a great body, a great mullet???</h1>\r\n\r\n<h2>Let&rsquo;s find out&hellip;</h2>', 'Banner Text', 'Banner Text', 'Banner Text', '2022-05-16 01:38:39', '2022-05-18 22:42:21'),
(9, 'About us', '<p>Technoconcept India Pvt. Ltd. is a company with vast experience in various fields related to Bioscience research. It is a Delhi-based company that has been catering to the needs of plethora of universities and scientific institutions in and around Delhi, has operations covering entire India and also has global reach/footprint. Its product panel encompasses various laboratory equipments, bioinformatics software, genomics and proteomics services and it is growing concurrent with technological advancements and concomitant requirements of the scientific community.</p>\r\n\r\n<p>As a second phase of expansion, Technoconcept established OLabX as its sister company in 2020. OLabX is a global website to buy and sell the old, used and refurbished medical, scientific and industrial equipment to support the laboratories with shortage of funds. This company facilitates peer to peer chat for secure communication and bidding option for large scale co-operations. Implementation of Escrow payment provides a trust among unknowns.</p>\r\n\r\n<p>Our journey has continued. In the current year (2022), yet another endeavor by Technoconcept Pvt India Ltd. to support the field of scientific research that brings you the job seeking/career support services. After discussions with various scientists and management personnel in industry and academics, it was felt that there is a need for a job portal dedicated purely for Research-based jobs where both the government and private organizations can advertise their laboratory/organizational positions. The site (www.thesciencejobs.in) is being launched to help the tech savvy and young researchers to look for premium job positions based on their job profiles, qualifications and aspirations. Though there are a large number of job portals already in existence for more than two decades, ours is dedicated for research-based jobs in life sciences and engineering fields.</p>\r\n\r\n<p>This job portal would cater to faculties, research scholars, graduate and post graduate students, and other research professionals engaged in academic institutions, universities and industries. All government institutions will be allowed to post their job requirements <em>FREE OF CHARGE</em>. Private industry/research organizations and global organizations would need to pay anominal subscription fees for their job postings. The website offers free &ldquo;match making&rdquo; services based on the common requirements of job seekers and job providers.</p>\r\n\r\n<p>To support Industry and Academia in all possible ways, the mantra for all these endeavours by Technoconcept India Pvt. Ltd. is <strong>&ldquo;complete customer satisfaction in terms of Service, technology, delivery and technical support&rdquo;</strong>.</p>', 'About us | The Science Jobs', 'About Us of The Science Jobs', 'About Us, The Science Jobs,', '2022-06-23 00:08:49', '2022-06-23 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sports_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2017_06_02_142513_create_1496402713_roles_table', 1),
(8, '2017_06_02_142514_create_1496402714_users_table', 1),
(9, '2017_06_02_142600_create_1496402760_teams_table', 1),
(10, '2017_06_02_142750_create_1496402870_players_table', 1),
(11, '2017_06_02_142935_create_1496402975_games_table', 1),
(12, '2022_01_28_121501_create_sports_table', 1),
(13, '2022_01_28_122653_create_states_table', 1),
(14, '2022_01_29_043946_create_countries_table', 1),
(15, '2022_01_29_045651_add_country_id_column_in_state', 1),
(16, '2022_01_29_054243_create_clubs_table', 1),
(17, '2022_01_31_090918_create_leagues_table', 1),
(18, '2022_02_08_093341_create_team_league_histories_table', 1),
(19, '2022_02_08_114851_games_commentry', 1),
(20, '2022_02_09_063200_add_sport_id_in_team', 1),
(21, '2022_02_14_072134_some_field_null_in_teams', 1),
(22, '2022_02_16_101628_create_club_league_histories_table', 1),
(23, '2022_02_21_065924_create_team_player_histories_table', 1),
(24, '2022_02_22_072041_create_sports_roles_table', 1),
(25, '2022_02_22_085159_add_two_columns_in_player_table', 1),
(26, '2022_02_26_062540_add_key_in_match_table', 1),
(27, '2022_02_26_062954_create_player_in_team_for_matches_table', 1),
(28, '2022_02_28_054833_add_two_column_in_game_table', 1),
(29, '2022_03_03_130204_add_two_cloumn_in_games', 1),
(30, '2022_03_04_060343_add_two_column_in_team_player_history', 1),
(31, '2022_03_04_091349_create_match_details_table', 1),
(32, '2022_03_07_054045_add_one_column_in_players', 1),
(33, '2022_03_19_121127_add_two_columns_in_players_match', 1),
(34, '2022_03_22_043239_create_batsmen_table', 1),
(35, '2022_03_22_063137_two_column_add_in_games', 1),
(36, '2022_03_22_071527_create_bowlers_table', 1),
(37, '2022_04_18_063036_information', 1),
(38, '2022_04_19_065551_contest', 1),
(39, '2022_04_19_091427_gallery', 2),
(40, '2022_04_26_081657_registration', 3),
(41, '2022_04_29_101413_voters', 4),
(42, '2022_05_11_065103_stripe', 5),
(43, '2022_05_13_065745_user_voter', 5),
(44, '2022_05_14_110822_contactus', 5),
(45, '2022_05_17_043849_sponser', 5),
(46, '2022_06_02_102547_create_jobs_table', 5),
(47, '2022_06_02_121326_create_failed_jobs_table', 5),
(48, '2022_06_10_054310_job', 6),
(49, '2022_06_13_100325_tb_apply', 6),
(50, '2022_06_13_100714_tb_user_apply', 6),
(51, '2022_06_14_104541_blog', 6),
(52, '2022_06_29_074230_category', 7),
(53, '2022_06_29_083158_sub_category', 8),
(54, '2022_06_29_115321_designation', 9),
(55, '2022_07_05_120504_create_job', 10),
(56, '2022_07_14_120324_form_details', 11),
(57, '2022_07_14_163520_form_fields', 12),
(58, '2022_07_20_154013_tb_employer', 13),
(59, '2022_07_27_084421_tb_jobseeker', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_in_team_for_matches`
--

CREATE TABLE `player_in_team_for_matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `match_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_a` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`team_a`)),
  `team_b` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`team_b`)),
  `innings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`innings`)),
  `commentry` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`commentry`)),
  `progress_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Not Started, 1=In Progress, 2=Finished',
  `team_a_captain_id` int(11) DEFAULT NULL,
  `team_a_wicket_keeper_id` int(11) DEFAULT NULL,
  `team_b_captain_id` int(11) DEFAULT NULL,
  `team_b_wicket_keeper_id` int(11) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `o_phone` varchar(191) DEFAULT NULL,
  `registration_id` varchar(191) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `resume` varchar(191) DEFAULT NULL,
  `last_work` text DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `salary` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `expectations` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `categories` varchar(191) DEFAULT NULL,
  `subcategories` varchar(191) DEFAULT NULL,
  `selection_job` varchar(191) DEFAULT NULL,
  `agree` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `phone`, `o_phone`, `registration_id`, `image`, `resume`, `last_work`, `designation`, `salary`, `address`, `zip_code`, `city`, `state`, `expectations`, `remarks`, `categories`, `subcategories`, `selection_job`, `agree`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testing', 'rahul@ecs.com', '9460582824', '9460582824', 'test', '2391616419.png', '7721562546.png', 'TEST', 'Test', '123455', 'Housing Society', '306401', 'Pali', 'Rajasthan', 'Test', 'Test', 'Engineering', 'Engineering', 'Assistant Professor', '1', '1', '2022-06-27 23:43:25', '2022-06-27 23:43:25'),
(2, 'Testing', 'vikas@ecs.com', '9460582824', NULL, 'JOB123456', '9259075057.jpg', '5368456200.pdf', 'Details of the present employment...', 'non', '123456', 'Housing Society', '306401', 'Pali', 'Rajasthan', 'Expectations for the job...', 'Expectations for the job', 'Science/Medical Science', 'Engineering', 'Junior Research Fellow (JRF)', '1', '1', '2022-06-29 00:17:55', '2022-06-29 00:17:55'),
(3, 'Testing', 'vijay@ecs.com', '9460582824', NULL, 'JOB123456', '171125490.jpg', '63620576.pdf', 'Details of the present employment.', 'non', '123456', 'Housing Society', '306401', 'Pali', 'Rajasthan', 'Expectations for the job.', 'Expectations for the job,.', 'Science/Medical Science', 'Science', 'Senior Research Fellow (SRF)', '1', '1', '2022-06-29 00:21:10', '2022-06-29 00:21:10'),
(4, 'Vikas', 'test@ecs.com', '8916418921', NULL, 'JOB987654', '2392276015.jpg', '8873311437.pdf', 'Details of the present employment.', 'Test', '10,000 - 20,000', 'Address', '342001', 'Jodhpur', 'Rajasthan', 'Details of the present employment.', 'Details Of The Present Employment.', 'Science/Medical Science', 'Science', 'Chief Scientific Officer (CSO)', '1', '1', '2022-06-29 01:57:32', '2022-06-29 01:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2022-04-19 08:12:57', '2022-04-19 08:12:57'),
(2, 'Simple user', '2022-04-19 08:13:23', '2022-04-19 08:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `s_name` varchar(250) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `alt_tag` varchar(250) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`id`, `contest_id`, `s_name`, `link`, `image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES
(14, 16, 'Colgate', 'https://www.colgate.com.au/', '362577371.jpg', 'Colgate', '1', '2022-05-19 06:45:49', '2022-05-19 06:45:49'),
(15, 16, 'Colgate', 'https://www.colgate.com.au/', '873356011.jpg', 'Colgate', '1', '2022-05-19 06:45:49', '2022-05-19 06:45:49'),
(16, 16, 'Colgate', 'https://www.colgate.com.au/', '5541442002.jpg', 'Colgate', '1', '2022-05-19 06:45:49', '2022-05-19 06:45:49'),
(17, 16, 'Colgate', 'https://www.colgate.com.au/', '3723388329.jpg', 'Colgate', '1', '2022-05-19 06:45:49', '2022-05-19 06:45:49'),
(18, 15, 'Peloton', 'https://www.onepeloton.com.au/', '9166224328.jpg', 'Peloton', '1', '2022-05-19 07:18:32', '2022-05-19 07:18:32'),
(19, 15, 'Peloton', 'https://www.onepeloton.com.au/', '8354937559.jpg', 'Peloton', '1', '2022-05-19 07:18:32', '2022-05-19 07:18:32'),
(20, 15, 'Peloton', 'https://www.onepeloton.com.au/', '6895082914.jpg', 'Peloton', '1', '2022-05-19 07:18:32', '2022-05-19 07:18:32'),
(21, 15, 'Peloton', 'https://www.onepeloton.com.au/', '3583501158.jpg', 'Peloton', '1', '2022-05-19 07:18:32', '2022-05-19 07:18:32'),
(22, 14, 'Nike', 'https://www.nike.com/', '4386790067.jpg', 'Nike', '1', '2022-05-19 08:32:16', '2022-05-19 08:32:16'),
(23, 14, 'Nike', 'https://www.nike.com/', '3418685946.jpg', 'Nike', '1', '2022-05-19 08:32:16', '2022-05-19 08:32:16'),
(24, 14, 'Nike', 'https://www.nike.com/', '4803774543.jpg', 'Nike', '1', '2022-05-19 08:32:16', '2022-05-19 08:32:16'),
(25, 14, 'Nike', 'https://www.nike.com/', '6361527408.jpg', 'Nike', '1', '2022-05-19 08:32:16', '2022-05-19 08:32:16'),
(27, 17, 'Manscaped', 'https://au.manscaped.com/', '8955291808.jpg', 'Manscaped', '1', '2022-05-19 09:50:10', '2022-05-19 09:50:10'),
(28, 17, 'Manscaped', 'https://au.manscaped.com/', '7428469091.jpg', 'Manscaped', '1', '2022-05-19 09:50:10', '2022-05-19 09:50:10'),
(29, 17, 'Manscaped', 'https://au.manscaped.com/', '9764004966.jpg', 'Manscaped', '1', '2022-05-19 09:51:02', '2022-05-19 09:51:02'),
(30, 20, 'Bubs Baby Formula', 'https://www.bubsaustralia.com/', '8060793594.png', 'Bubs Baby Formula', '1', '2022-06-06 04:46:11', '2022-06-06 04:46:11'),
(31, 20, 'Bubs Baby Formula', 'https://www.bubsaustralia.com/', '8093830285.png', 'Bubs Baby Formula', '1', '2022-06-06 04:46:11', '2022-06-06 04:46:11'),
(32, 20, 'Bubs Baby Formula', 'https://www.bubsaustralia.com/', '5500304782.png', 'Bubs Baby Formula', '1', '2022-06-06 04:46:11', '2022-06-06 04:46:11'),
(33, 20, 'Bubs Baby Formula', 'https://www.bubsaustralia.com/', '2525828665.png', 'Bubs Baby Formula', '1', '2022-06-06 04:46:11', '2022-06-06 04:46:11'),
(35, 22, NULL, NULL, '7872012342.jpg', NULL, '1', '2022-06-08 08:13:59', '2022-06-08 08:16:33'),
(36, 22, 'Baby Moo', 'https://babymoo.in/', '6519846129.jpg', 'Baby Moo', '1', '2022-06-08 08:15:50', '2022-06-08 08:15:50'),
(37, 22, 'Baby Moo', 'https://babymoo.in/', '2704185775.jpg', 'Baby Moo', '1', '2022-06-08 08:15:50', '2022-06-08 08:15:50'),
(38, 22, 'Baby Moo', 'https://babymoo.in/', '9722254885.jpg', 'Baby Moo', '1', '2022-06-08 08:16:33', '2022-06-08 08:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `strip`
--

CREATE TABLE `strip` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `payment_amount` varchar(191) DEFAULT NULL,
  `payment_status` varchar(250) DEFAULT NULL,
  `payment_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strip`
--

INSERT INTO `strip` (`id`, `registration_id`, `description`, `payment_amount`, `payment_status`, `payment_time`, `created_at`, `updated_at`) VALUES
(1, 36, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-12 10:43:42', '2022-05-12 10:43:42'),
(3, 37, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-12 10:47:40', '2022-05-12 10:47:40'),
(4, 38, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-12 10:48:39', '2022-05-12 10:48:39'),
(5, 39, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-12 10:49:37', '2022-05-12 10:49:37'),
(24, 41, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-12 12:09:21', '2022-05-12 12:09:21'),
(25, 1, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-20 06:24:04', '2022-05-20 06:24:04'),
(26, 6, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-05-27 04:23:35', '2022-05-27 04:23:35'),
(27, 23, 'Entry Fees for Contest.', '$100', 'Sucess', NULL, '2022-06-05 10:56:09', '2022-06-05 10:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `title`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Botany', 'Botany | Science Job | The Science Job', 'Botany Sub-Category Of Science Job.', '1', '2022-06-29 03:26:14', '2022-06-29 03:26:14'),
(2, '2', 'Aerospace Engineering', 'Aerospace Engineering Job | Engineering Job | The Science Job', 'Aerospace Engineering Job Page Engineering Job.', '1', '2022-06-29 03:37:12', '2022-06-29 03:37:12'),
(3, '1', 'Biochemistry', 'Biochemistry Job | Science Job | The Science Job', 'Biochemistry Job Page Medical Job.', '1', '2022-06-29 03:38:02', '2022-06-29 03:59:56'),
(4, '1', 'Bioinformatics Job', 'Bioinformatics Job | Science Job | The Science Job', 'Bioinformatics Job Page Science Job.', '1', '2022-06-29 03:40:51', '2022-06-29 03:40:51'),
(5, '1', 'Biotechnology', 'Biotechnology Job | Science Job | The Science Job', 'Biotechnology Job Page Science Job.', '1', '2022-06-29 03:42:24', '2022-06-29 03:42:24'),
(6, '1', 'Cell Biology', 'Cell Biology Job | Science Job | The Science Job', 'Cell Biology Job Page Science Job.', '1', '2022-06-29 03:43:13', '2022-06-29 03:43:13'),
(7, '1', 'Chemistry', 'Chemistry Job', 'Chemistry Job', '1', '2022-06-29 05:01:42', '2022-06-29 05:01:42'),
(8, '1', 'Developmental Biology', 'Developmental Biology Job', 'Developmental Biology Job', '1', '2022-06-29 05:02:07', '2022-06-29 05:02:07'),
(9, '1', 'Forensic', 'Forensic Job', 'Forensic Job', '1', '2022-06-29 06:51:46', '2022-06-29 06:51:46'),
(10, '1', 'Immunology', 'Immunology Job', 'Immunology Job', '1', '2022-06-29 06:52:03', '2022-06-29 06:52:03'),
(11, '1', 'Life Sciences', 'Life Sciences Job', 'Life Sciences Job', '1', '2022-06-29 06:52:18', '2022-06-29 06:52:18'),
(12, '1', 'Material Sciences', 'Material Sciences Job', 'Material Sciences Job', '1', '2022-06-29 06:52:34', '2022-06-29 06:52:34'),
(13, '1', 'Medical Biotechnology', 'Medical Biotechnology Job', 'Medical Biotechnology Job', '1', '2022-06-29 06:52:49', '2022-06-29 06:52:49'),
(14, '1', 'Nanotechnology', 'Nanotechnology Job', 'Nanotechnology Job', '1', '2022-06-29 06:53:04', '2022-06-29 06:53:04'),
(15, '1', 'Neurobiology', 'Neurobiology Job', 'Neurobiology Job', '1', '2022-06-29 06:53:17', '2022-06-29 06:53:17'),
(16, '1', 'Physics', 'Physics Job', 'Physics Job', '1', '2022-06-29 06:53:34', '2022-06-29 06:53:34'),
(17, '1', 'Systems Biology', 'Systems Biology Job', 'Systems Biology Job', '1', '2022-06-29 06:53:49', '2022-06-29 06:53:49'),
(18, '1', 'Zoology', 'Zoology Job', 'Zoology Job', '1', '2022-06-29 06:54:01', '2022-06-29 06:54:01'),
(19, '1', 'Others', 'Others', 'Others', '1', '2022-06-29 06:54:13', '2022-06-29 06:54:13'),
(20, '2', 'Agriculture & Food Engineering', 'Agriculture & Food Engineering Job', 'Agriculture & Food Engineering Job', '1', '2022-06-29 06:54:47', '2022-06-29 06:54:47'),
(21, '2', 'Automobile Engineering', 'Automobile Engineering Job', 'Automobile Engineering Job', '1', '2022-06-29 06:55:03', '2022-06-29 06:55:03'),
(22, '2', 'Biotechnology Engineering', 'Biotechnology Engineering Job', 'Biotechnology Engineering Job', '1', '2022-06-29 06:55:20', '2022-06-29 06:55:20'),
(23, '2', 'Ceramic Engineering', 'Ceramic Engineering Job', 'Ceramic Engineering Job', '1', '2022-06-29 06:55:36', '2022-06-29 06:55:36'),
(24, '2', 'Chemical Engineering', 'Chemical Engineering Job', 'Chemical Engineering Job', '1', '2022-06-29 06:55:49', '2022-06-29 06:55:49'),
(25, '2', 'Civil Engineering', 'Civil Engineering Job', 'Civil Engineering Job', '1', '2022-06-29 06:56:05', '2022-06-29 06:56:05'),
(26, '2', 'Computer Engineering', 'Computer Engineering Job', 'Computer Engineering Job', '1', '2022-06-29 06:56:35', '2022-06-29 06:56:35'),
(27, '2', 'Aerodynamics and Fluid Mechanics', 'Aerodynamics and Fluid Mechanics Job', 'Aerodynamics and Fluid Mechanics Job', '1', '2022-06-29 06:56:47', '2022-06-29 06:56:47'),
(28, '2', 'Bioengineering', 'Bioengineering Job', 'Bioengineering Job', '1', '2022-06-29 06:57:02', '2022-06-29 06:57:02'),
(29, '2', 'Biomechanics', 'Biomechanics Job', 'Biomechanics Job', '1', '2022-06-29 06:57:14', '2022-06-29 06:57:14'),
(30, '2', 'Combustion and Energy Systems', 'Combustion and Energy Systems Job', 'Combustion and Energy Systems Job', '1', '2022-06-29 06:57:29', '2022-06-29 06:57:29'),
(31, '2', 'Design and Manufacturing', 'Design and Manufacturing Job', 'Design and Manufacturing Job', '1', '2022-06-29 06:57:43', '2022-06-29 06:57:43'),
(32, '2', 'Dynamics and Control', 'Dynamics and Control Job', 'Dynamics and Control Job', '1', '2022-06-29 06:57:56', '2022-06-29 06:57:56'),
(33, '2', 'High-Speed Computation', 'High-Speed Computation Job', 'High-Speed Computation Job', '1', '2022-06-29 06:58:13', '2022-06-29 06:58:13'),
(34, '2', 'Materials and Structures', 'Materials and Structures Job', 'Materials and Structures Job', '1', '2022-06-29 06:58:24', '2022-06-29 06:58:24'),
(35, '2', 'Nanotechnology', 'Nanotechnology Job', 'Nanotechnology Job', '1', '2022-06-29 06:58:37', '2022-06-29 06:58:37'),
(36, '2', 'Power Systems', 'Power Systems Job', 'Power Systems Job', '1', '2022-06-29 06:58:51', '2022-06-29 06:58:51'),
(37, '2', 'Vibrations, Acoustics and Fluid-Structure Interaction', 'Vibrations, Acoustics and Fluid-Structure Interaction', 'Vibrations, Acoustics and Fluid-Structure Interaction', '1', '2022-06-29 06:59:02', '2022-06-29 06:59:02'),
(38, '2', 'Others', 'Others', 'Others', '1', '2022-06-29 06:59:09', '2022-06-29 06:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_apply`
--

CREATE TABLE `tb_apply` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `full_name` varchar(191) DEFAULT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `qualification` varchar(191) DEFAULT NULL,
  `experience` varchar(250) DEFAULT NULL,
  `last_work` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `resume` varchar(191) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `role_id` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_apply`
--

INSERT INTO `tb_apply` (`id`, `job_id`, `full_name`, `father_name`, `phone`, `email`, `qualification`, `experience`, `last_work`, `address`, `state`, `city`, `zip_code`, `image`, `resume`, `status`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 5, 'Testing', 'Father Name', '9460582824', 'new@gmail.com', 'Master in computer scince', '1+', 'data entry', 'Housing Society', 'India', 'Pali', '306401', '8739537268.jpg', '1786215674.jpg', '1', '3', '2022-06-13 10:39:10', '2022-06-13 10:39:10'),
(5, 4, 'Full Name', 'Father Name', '6543219875', 'new@testing.com', 'B.A', '0', NULL, 'Testing', 'India', 'Pali', '306401', '1567278118.jpg', '939315397.pdf', '1', '3', '2022-06-13 10:41:11', '2022-06-13 10:41:11'),
(6, 5, 'Testing', 'Father Name', '9460582824', 'rahul@ecs.com', NULL, '1', NULL, 'Housing Society', 'Rajasthan', 'Pali', '306401', '8633079673.jpg', '8517058415.pdf', '1', '3', '2022-07-06 11:13:50', '2022-07-06 11:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `sub_para` text DEFAULT NULL,
  `posting_date` varchar(191) DEFAULT NULL,
  `category` varchar(250) NOT NULL,
  `feature_img` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `author_name` varchar(191) DEFAULT NULL,
  `author_comment` text DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `title`, `sub_para`, `posting_date`, `category`, `feature_img`, `description`, `author_name`, `author_comment`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Edited Test Blog', 'Edited Test Blog, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2022-06-13', 'Testing Edit', '8302298615.jpg', '<p>Edited Test Blog, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>', 'Admin Edit', 'No Comment.', 'Edited Test Blog | Job', 'Edited Test Blog Page.', '1', '2022-06-14 05:33:21', '2022-06-16 05:14:11'),
(5, 'It’s Time to job Now!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', '2022-06-15', 'Information Blog', '5624402491.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>\r\n\r\n<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', 'Admin', 'No Comment Yet.', 'It’s Time to job Now! | Blog | The Science Jobs', 'It’s Time to job Now!, Blog Page.', '1', '2022-06-16 04:23:31', '2022-06-16 05:13:53'),
(6, 'Testing', 'Test', '2022-07-05', 'Testing', '1591441105.jpg', '<p>Test</p>', NULL, NULL, 'Test | Blog', 'Test', '1', '2022-07-06 05:17:03', '2022-07-06 05:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employer`
--

CREATE TABLE `tb_employer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_employer`
--

INSERT INTO `tb_employer` (`id`, `role_id`, `prefix`, `first_name`, `middle_name`, `last_name`, `email`, `contact_number`, `whatsapp_number`, `company_name`, `company_website`, `company_description`, `company_logo`, `company_address`, `zip_code`, `company_location`, `linkedin`, `facebook`, `twitter`, `accept_terms`, `required`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', 'Mr.', 'Rahul', NULL, 'Yadav', 'rahul@ecs.com', '94612210201', NULL, 'Whatsapp Now', 'https://www.sclcricket.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '4849483772.png', 'Software Technology Parks of India, Plot No. CYB-I, Cyber Park, Near Saras Dairy, RIICO Heavy Industrial Area, Jodhpur, Rajasthan', '342001', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14313.16968748284!2d72.9982878!3d26.2521712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb547e3d8793a667!2sE-CYBERTECH%20SOLUTION!5e0!3m2!1sen!2sin!4v1658820975496!5m2!1sen!2sin\" width=\"600\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', NULL, '', NULL, '1', '1', '2022-07-25 02:23:29', '2022-07-25 02:23:29'),
(22, '2', 'Mr.', 'Rahul', NULL, 'Yadav', 'rahul@ecybertech.com', '9461221201', '8619418921', 'EcyberTech Solution', NULL, 'E-CyberTech Solution is a website, web applications, school management software, college management software professional services company providing outsource offshore web design, web development, Web Redesigning, education erp, college erp, campus automation, offshore customized software development and ecommerce solutions to customers around the globe. Our business-driven approach separates us from typical web design companies. As the Internet continues to serve as the world\'s largest marketplace, we aim to be streets ahead of the curve and offer our clients best-in-class solutions from start to end. Our process is carefully formulated to ensure that your project is taken from the idea stage to the commercialization stage impeccably and cost-effectively.', '4730774930.png', 'Software Technology Parks of India, Plot No. CYB-I, Cyber Park, Near Saras Dairy, RIICO Heavy Industrial Area, Jodhpur, Rajasthan', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14313.16968748284!2d72.9982878!3d26.2521712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb547e3d8793a667!2sE-CYBERTECH%20SOLUTION!5e0!3m2!1sen!2sin!4v1658919704008!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.linkedin.com/company/3265670', 'https://www.facebook.com/ecybertechsolution.ltd', 'https://twitter.com/ECyberTech', NULL, '1', '1', '2022-07-27 05:33:09', '2022-07-27 05:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job`
--

CREATE TABLE `tb_job` (
  `id` int(11) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `company_link` varchar(191) DEFAULT NULL,
  `company_logo` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `job_title` varchar(191) DEFAULT NULL,
  `job_time` varchar(191) DEFAULT NULL,
  `date_posted` varchar(191) DEFAULT NULL,
  `hours` varchar(191) DEFAULT NULL,
  `salary` varchar(191) DEFAULT NULL,
  `job_type` varchar(191) DEFAULT NULL,
  `category` varchar(191) DEFAULT NULL,
  `job_decription` text DEFAULT NULL,
  `min_qualification` text DEFAULT NULL,
  `how_apply` text DEFAULT NULL,
  `experience` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_job`
--

INSERT INTO `tb_job` (`id`, `company_name`, `company_link`, `company_logo`, `address`, `job_title`, `job_time`, `date_posted`, `hours`, `salary`, `job_type`, `category`, `job_decription`, `min_qualification`, `how_apply`, `experience`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Prize Pool Win', 'http://prizepool.win/', '6322818959.png', 'Melbourne, Australia,  \r\n03991', 'Manage Contest', '9:00 AM to 5:00 PM', '2022-06-10', '8', '20k - 30k', 'Full Time', 'DATA ENTRY', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>It is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>-&nbsp;The standard Lorem Ipsum passage, used since the 1500s.</p>\r\n\r\n<p>-&nbsp;Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC.</p>\r\n\r\n<p>-&nbsp;1914 translation by H. Rackham.</p>\r\n\r\n<p>-&nbsp;Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC.</p>\r\n\r\n<p>- 1914 translation by H. Rackham.</p>', '1+ Years Experience', 'Contest Management Job', 'Contest Management Job.', '1', '2022-06-10 05:27:43', '2022-06-12 23:16:02'),
(5, 'State Star Cricket', 'https://www.sclcricket.com/', '5250399763.jpg', 'Los Angeles California PO, \r\n455001', 'Cricket Match Data Management', '9:00 AM to 5:00 PM', '2022-06-10', '8', '25k - 30k', 'Part Time', 'DATA ENTRY', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2+ Years Experience', 'State Star Cricket Job', 'Data Entry Job at State Star Cricket Association.', '1', '2022-06-10 05:39:10', '2022-06-12 23:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobseeker`
--

CREATE TABLE `tb_jobseeker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presernt_work` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategories` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selection_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jobseeker`
--

INSERT INTO `tb_jobseeker` (`id`, `role_id`, `prefix`, `first_name`, `middle_name`, `last_name`, `dob`, `email`, `mobile_number`, `other_number`, `photo`, `resume`, `description`, `presernt_work`, `exp_salary`, `address`, `zip_code`, `city`, `state`, `categories`, `subcategories`, `selection_job`, `accept_terms`, `required`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Mr.', 'Vikas', 'Kumar', 'Vyas', '1999-04-03', 'vikasvyas@gmail.com', '9461221201', NULL, '4646705378.jpg', '3539200775.pdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Currently unavailable.', '2,00,000 - 5,00,000', 'Old City, Jodhpur, Rjasthan, India', '342001', 'Jodhpur', 'Rajasthan', 'Science/Medical Science', 'Forensic', 'Junior Research Fellow (JRF)', '1', '1', '1', '2022-07-27 05:42:07', '2022-07-27 05:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_apply`
--

CREATE TABLE `tb_user_apply` (
  `id` int(11) NOT NULL,
  `job_id` varchar(191) DEFAULT NULL,
  `apply_id` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role_id` varchar(25) DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_apply`
--

INSERT INTO `tb_user_apply` (`id`, `job_id`, `apply_id`, `name`, `email`, `password`, `role_id`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 'Testing', 'admin@admin.com', '$2y$10$YMOA8rjp18uf1ZARCGiY1.iZBgfKCgjHugiHIyRMikvWdWDQErdaG', '3', NULL, '1', '2022-06-13 10:26:36', '2022-06-13 10:26:36'),
(2, '5', '2', 'Candidate Name', 'teting@gmail.com', '$2y$10$sYoulNd6FQA798eoUsM.w.ZrbFzZTLwFzxFKu990lukpp2/vjDUVO', '3', NULL, '1', '2022-06-13 10:33:01', '2022-06-13 10:33:01'),
(3, '5', '3', 'Testing', 'rahul@gmail.com', '$2y$10$knuRKFDS.pigArgSABrBB.P8WxfmRElAQExFDa3IA7dgkb8t3FhTq', '3', NULL, '1', '2022-06-13 10:37:31', '2022-06-13 10:37:31'),
(4, '5', '4', 'Testing', 'new@gmail.com', '$2y$10$ijwsjig2/eY44yCFc7cwa.W71d2B3eB.mY4MlE01MAwt5IpYMp..i', '3', NULL, '1', '2022-06-13 10:39:10', '2022-06-13 10:39:10'),
(5, '4', '5', 'Full Name', 'new@testing.com', '$2y$10$stzERhu.EQp/kdLv2yJomuDcGfJBgpy24MwDYxxnXnXAtjyuIKska', '3', NULL, '1', '2022-06-13 10:41:11', '2022-06-13 10:41:11'),
(6, '5', '6', 'Testing', 'rahul@ecs.com', '$2y$10$fYVsrg66//HT88kO/Uvkxuaz.OFNCY1GQBN2K9FJZEQbfO9JQ1p6W', '3', NULL, '1', '2022-07-06 11:13:50', '2022-07-06 11:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `sports_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_league_histories`
--

CREATE TABLE `team_league_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL,
  `league_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_player_histories`
--

CREATE TABLE `team_player_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `log_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1= active, 0=inactive',
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `job_id` int(10) NOT NULL DEFAULT 0,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `data_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `status`, `role_id`, `job_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin', 'admin@admin.com', NULL, '$2y$10$aZqEq6LEVHSUH/S4a85FsOuiPggBEtZIdhXdGMUAw2UJ5OxABMoN6', '1', 1, 0, 'Ti1dCi9Zfknw3V1EfcZhRZaAfuFSxP5ZBM0uL4xRuJ4AVWZ9Un3jdsy6FGoo', '2022-04-19 08:13:56', '2022-04-19 08:13:56'),
(2, NULL, 'Peter Schofield', 'schoey776@gmail.com', 'schoey776@gmail.com', NULL, '$2y$10$moB/kbEfNEX1YxwvmEHPZeybvl/RWyojN31mN1Rbl2BF05ygt5iq.', '1', 1, 0, NULL, '2022-05-15 19:18:40', '2022-05-15 19:18:40'),
(3, '2', 'Rahul  Yadav', 'rahul@ecs.com', 'rahul@ecs.com', NULL, '$2y$10$kkogBYLkgeRarZcGH5/bsOb/APXPq.IXsffb2HpESwbqD2WkhbM2.', '1', 2, 1, NULL, '2022-07-25 02:23:51', '2022-07-25 02:23:51'),
(5, '22', 'Rahul  Yadav', 'rahul@ecybertech.com', 'rahul@ecybertech.com', NULL, '$2y$10$kkogBYLkgeRarZcGH5/bsOb/APXPq.IXsffb2HpESwbqD2WkhbM2.', '1', 2, 1, NULL, '2022-07-27 05:33:19', '2022-07-27 05:33:19'),
(6, '1', 'Vikas  Vyas', 'vikasvyas@gmail.com', 'vikasvyas@gmail.com', NULL, '$2y$10$q/vlZiefEWi2rsv1rewzxeTriDn5cl8bKG.GVaCPQQXxE7x8cXphK', '1', 2, 2, NULL, '2022-07-27 05:42:18', '2022-07-27 05:42:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubs_state_id_foreign` (`state_id`),
  ADD KEY `clubs_sports_id_foreign` (`sports_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_job`
--
ALTER TABLE `create_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_details`
--
ALTER TABLE `form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_commetnries`
--
ALTER TABLE `games_commetnries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leagues_state_id_foreign` (`state_id`),
  ADD KEY `leagues_sports_id_foreign` (`sports_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `player_in_team_for_matches`
--
ALTER TABLE `player_in_team_for_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `strip`
--
ALTER TABLE `strip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_apply`
--
ALTER TABLE `tb_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_employer`
--
ALTER TABLE `tb_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jobseeker`
--
ALTER TABLE `tb_jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_apply`
--
ALTER TABLE `tb_user_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_sports_id_foreign` (`sports_id`);

--
-- Indexes for table `team_league_histories`
--
ALTER TABLE `team_league_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_league_histories_team_id_foreign` (`team_id`),
  ADD KEY `team_league_histories_league_id_foreign` (`league_id`);

--
-- Indexes for table `team_player_histories`
--
ALTER TABLE `team_player_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `41905_59314b1a6c90f` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_job`
--
ALTER TABLE `create_job`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_details`
--
ALTER TABLE `form_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games_commetnries`
--
ALTER TABLE `games_commetnries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_in_team_for_matches`
--
ALTER TABLE `player_in_team_for_matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strip`
--
ALTER TABLE `strip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_apply`
--
ALTER TABLE `tb_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_employer`
--
ALTER TABLE `tb_employer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jobseeker`
--
ALTER TABLE `tb_jobseeker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user_apply`
--
ALTER TABLE `tb_user_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_league_histories`
--
ALTER TABLE `team_league_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_player_histories`
--
ALTER TABLE `team_player_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_sports_id_foreign` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clubs_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leagues`
--
ALTER TABLE `leagues`
  ADD CONSTRAINT `leagues_sports_id_foreign` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leagues_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_sports_id_foreign` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_league_histories`
--
ALTER TABLE `team_league_histories`
  ADD CONSTRAINT `team_league_histories_league_id_foreign` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_league_histories_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `41905_59314b1a6c90f` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
