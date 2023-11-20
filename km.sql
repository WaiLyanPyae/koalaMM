-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2023 at 08:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `listing_id`, `start_date`, `end_date`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 13, '2023-11-25', '2023-11-26', 196.00, 'cancelled', '2023-11-17 22:01:06', '2023-11-18 01:20:07'),
(3, 3, 14, '2023-11-19', '2023-11-26', 1400.00, 'confirmed', '2023-11-17 22:04:43', '2023-11-18 02:49:01'),
(4, 3, 10, '2023-11-24', '2023-11-29', 750.00, 'confirmed', '2023-11-17 22:13:12', '2023-11-17 22:13:12'),
(7, 3, 9, '2023-12-01', '2023-12-08', 861.00, 'confirmed', '2023-11-18 02:53:32', '2023-11-18 02:54:23'),
(8, 3, 12, '2023-11-30', '2023-12-09', 2700.00, 'confirmed', '2023-11-18 02:58:04', '2023-11-18 03:09:50'),
(9, 3, 14, '2023-11-30', '2023-12-10', 2000.00, 'cancelled', '2023-11-18 03:10:05', '2023-11-18 03:51:05'),
(10, 3, 9, '2023-11-24', '2023-11-30', 738.00, 'pending', '2023-11-18 03:59:31', '2023-11-18 03:59:31'),
(11, 3, 13, '2023-12-07', '2023-12-09', 392.00, 'pending', '2023-11-18 20:53:13', '2023-11-18 20:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available_from` date NOT NULL,
  `available_to` date DEFAULT NULL,
  `property_type` varchar(255) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `amenities` text NOT NULL,
  `max_guests` int(11) NOT NULL,
  `house_rules` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `title`, `description`, `location`, `price`, `available_from`, `available_to`, `property_type`, `bedrooms`, `bathrooms`, `amenities`, `max_guests`, `house_rules`, `images`, `created_at`, `updated_at`) VALUES
(8, 4, 'Gold Coast Hope Island Hotel Room 3', 'Stay With Me!', 'Hope Island, Queensland, Australia', 250.00, '2023-11-24', '2023-11-30', 'House', 3, 3, '4', 4, 'N/A', '\"{\\\"2\\\":\\\"public\\\\\\/listings\\\\\\/1hqW9vOAPyPlVTb13U25eRgD0EJi7UYMFmuX22L1.jpg\\\",\\\"3\\\":\\\"public\\\\\\/listings\\\\\\/QWQIub43LsLBcFsyLIUXS2VLrNYPAiMjfcNBAcub.jpg\\\",\\\"4\\\":\\\"public\\\\\\/listings\\\\\\/RXOXXNknkHvV1gAYTkUvViWayjIUgY972IQdQL3Z.jpg\\\",\\\"5\\\":\\\"public\\\\\\/listings\\\\\\/BP74QbulN5a606CJJw8wz1JjOJmwZQIpRBWA8ZZV.webp\\\",\\\"6\\\":\\\"public\\\\\\/listings\\\\\\/5Hm0Ex3U0lkrtgiczrvLwW8YH07nITbtZkloknce.webp\\\",\\\"7\\\":\\\"public\\\\\\/listings\\\\\\/VFsKkDlHucAEQBXfnKidjXz9IFm5tThxv8pWpTCE.webp\\\"}\"', '2023-11-15 22:08:49', '2023-11-16 01:48:21'),
(9, 4, 'Rest up and Recharge at a Vintage-Inspired Coastal Pad', 'Make your stay here.', 'Mermaid Beach, Queensland, Australia', 123.00, '2023-11-18', '2023-11-18', 'Hotel', 2, 2, '2', 2, 'sdf', '\"{\\\"1\\\":\\\"public\\\\\\/listings\\\\\\/LOO5oOem5ysusb6ideWlbRAqJrH76Zon3Px5OMIY.jpg\\\",\\\"2\\\":\\\"public\\\\\\/listings\\\\\\/g8ucuHTa19AcEsYktcyyh22dRanpFOCkZMZoKQgw.webp\\\",\\\"3\\\":\\\"public\\\\\\/listings\\\\\\/RvwKw1ERgCSOMOYyxMRMJxKqGdFqXO9pnzVF0VP7.webp\\\",\\\"4\\\":\\\"public\\\\\\/listings\\\\\\/nfVyTKgpr94yba8SjYKfnh6qtQaGwxgpAKgg8Eek.webp\\\"}\"', '2023-11-15 22:45:31', '2023-11-16 01:52:06'),
(10, 4, 'Budget-Friendly Coastal Suite w Pool & Car Park', '✔ Convenient and stress-free stay at an affordable rate, which includes complimentary parking, premium linens, and fast WiFi connection.\r\n✔ Patrolled beach is just a short distance away, reachable within minutes.\r\n✔ Tram stop conveniently situated right outside your doorstep.\r\n✔ Outdoor pool area with sun lounges.\r\n✔ Centrally located property within walking distance to the beach + many amenities.\r\nThe space\r\nWelcome to Gold Coast Inn!\r\n\r\nYour apartment aims to provide a comfortable and welcoming environment for you, ensuring that your room is a sanctuary where you can relax, rejuvenate, and enjoy your time in Surfers Paradise.\r\n\r\nLet\'s check out your pad.\r\n\r\n★ BEDROOM\r\n- 1 Queen Bed\r\n- Ultra Comfy Mattresses\r\n- Hotel-quality Linen\r\n\r\n★ KITCHEN\r\n- Refrigerator\r\n- Electric Kettle\r\n- Coffee Maker\r\n- Toaster\r\n- ...and everything else needed for a delicious meal!\r\n\r\n\r\n★ LOUNGE & DINING AREA\r\n- Dining for 2\r\n\r\n★ BATHROOM\r\n- Basic starter supply provided\r\n\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nKEY FEATURES\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~.\r\n\r\n\r\n★ AMENITIES: Outdoor Swimming Pool & Parking Area\r\n★ AIR CONDITIONING: Yes\r\n★ BEDDING/LINEN/TOWELS: Hotel-quality linen & Towels provided\r\n\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nBook now and we\'ll see you very soon!\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nGuest access\r\nEntire space is included in this rental. Please, make yourself at home.\r\nOther things to note\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nCHECK-IN INSTRUCTIONS & GUIDEBOOKS\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nOur check-in guide will be sent before your stay. It is a link to our website and includes detailed instructions, images and everything else to ensure a smooth check-in and an enjoyable stay.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nSAME-DAY BOOKINGS\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nIn order to make arrangements for housekeeping and check-in requirements, we require a booking lead time of at least one day. Hence, we cannot assure a 3pm check-in time for last-minute bookings, particularly when there is a departing guest. Guests who have made advance reservations and need to be checked-in are given priority over last-minute bookings.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nEARLY CHECK-IN REQUESTS\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nIt\'s highly recommended to plan for a 3pm check-in time. Once your place is prepared, we will inform you accordingly. In case you require earlier access, you may consider booking the night before, subject to availability. While we strive to accommodate such requests, please note that unlike hotels, we do not have alternate rooms to offer. Hence, if a guest checks out on the same day as your arrival, the housekeeping team requires sufficient time to prepare the place, and we appreciate your patience and understanding in such situations.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nLATE CHECK-OUT REQUESTS\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nDepending on our bookings and housekeeping schedules, it might be possible to arrange a later check-out time. Kindly get in touch with us after 8 pm on the day prior to your departure to verify if this can be arranged. We will make every effort to accommodate your request. However, if you need to check out after 12 pm, an extra night\'s fee will be levied and must be paid via the Airbnb Resolution Centre. This payment should be made the night before check-out; otherwise, housekeeping will be scheduled for the regular check-out time of 10 am.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nSTARTER SUPPLIES\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nIn order to set realistic expectations, we offer essential starter supplies to make your stay more comfortable These complimentary supplies comprise shampoo, conditioner, body wash, toilet paper, and a few other items. Please note that these supplies are not intended to last for the entire duration of your booking but are provided to avoid the need to rush to the supermarket immediately upon arrival. If you would like to request mid-stay services at any time during your booking, please inform us.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nPORTACOT AND HIGH CHAIR\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nThese are both available upon request. For safety & hygiene reasons, we don\'t provide linens & mattress for the portacot. This is due to the sensitive nature of precious baby skin and the detergents often used by large commercial laundries to clean these. It is much better for you to use fabrics, linens and to have your own mattress that are familiar to your baby\'s skin to avoid any sensitivities or allergic reactions. However, these cots do come with padded mat for the base.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nLISTING DISCLOSURE\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nBy confirming your reservation, you are acknowledging that you have carefully reviewed the listing and these house rules. Therefore, any information that was disclosed during the booking process cannot be used as a basis for grievances.\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\nHope to host you soon!', 'Surfers Paradise, Queensland, Australia', 150.00, '2023-11-24', '2023-11-24', 'Hotel', 2, 3, 'Kitchen,\r\nSpace where guests can cook their own meals,\r\nRefrigerator,\r\nMicrowave,\r\nDishes and cutlery,\r\nBowls, chopsticks, plates, cups, etc.,\r\nHot water kettle,\r\nToaster,\r\nDining table,\r\nCoffee', 3, 'enjoy', '\"[\\\"public\\\\\\/listings\\\\\\/1g3ckx3226znj3Oyx3OJYkUBooVUohNq7FmcBbwA.webp\\\",\\\"public\\\\\\/listings\\\\\\/DgPvBonnvrYgK4A5Zouo6c2DX46MSwhDf15AAHOz.webp\\\",\\\"public\\\\\\/listings\\\\\\/0dU7uIzE8WfDdDlY8OXJEk1zD2Wt0VJfuwjWSD1T.webp\\\",\\\"public\\\\\\/listings\\\\\\/5oyrDefIhEDozc6JLvl2M9xhnDpcMq1Fu5erAWBT.webp\\\"]\"', '2023-11-15 22:56:27', '2023-11-16 22:20:28'),
(12, 4, 'OCEAN VIEW Immaculate & Modern Unit on Gold Coast', 'Enjoy a modern 39th floor apartment with panoramic ocean and hinterland views through floor-to-ceiling windows, situated just behind Main Beach. Large balcony. Beautiful furniture. Enjoy the free standing bath, a comfortable leather lounge, houseplants, and two large ultra high definition TVs with Netlflix. Come enjoy paradise in style!\r\nThe space\r\nFully Ducted Air Conditioning\r\nBeautifully Furnished\r\n2nd Bedroom = Office Space\r\nTwo large 4K Ultra High Def TVs\r\nAmazing Views\r\nHigh Speed NBN WiFi internet\r\nLaundry - Washer and Dryer\r\nNetflix\r\nGuest access\r\nGuests may access entire unit - please not there is one bed in the unit in the master bedroom. The 2nd bedroom is an office with a desk.', 'Southport, Queensland, Australia', 300.00, '2023-11-18', '2023-11-30', 'Hotel', 3, 3, 'WIFI, Parking, Kitchen', 3, 'Flexible, Enjoy your stay.', '\"[\\\"public\\\\\\/listings\\\\\\/qqGHkQlCUHPHm1DgVpMZCWTVXI2PXV8HNo6iiS2G.webp\\\",\\\"public\\\\\\/listings\\\\\\/AP16IeTK9lx3LeCbs9xBSYbuwRMuTk7hQkb5FR3c.webp\\\",\\\"public\\\\\\/listings\\\\\\/vAxbS8kkKA8xT1HcHaktlMtBEIH0MbZQh7vEjqDA.webp\\\",\\\"public\\\\\\/listings\\\\\\/hNvU9R8KvLhi4zM79GIE1D0zkOpqp288TYABXKPa.webp\\\"]\"', '2023-11-16 00:51:40', '2023-11-16 22:28:11'),
(13, 5, 'New Modern Deco\' Apartment - Ocean View', 'New Listing From experienced Host\r\n\r\nThis 1 Bedroom modern stylish apartment with Queen size bed and a sofa bed, has just been fully purpose renovated for the perfect holiday experience.\r\nYou can Enjoy the Complex facilities 2 pools, Spa, Sauna, Gym, BBQ area, Free Secure Private Car Parking and Wifi included.\r\n\r\nLocated in between Central Surfers Paradise and the heart of Broadbeach. Close to Casino, Gold Coast Convention Centre, Supermarkets, Beach, Clubs, Restaurants and Major Shopping Centres.\r\nThe space\r\nA simple and sophisticated hotel experience with one Queen bed and sofa bed in the leaving room, The sofa bed can be made up to accommodate families with kids, accommodating a maximum of 2 Adult and 2 children\r\n\r\n\r\nThis 5th floor one bedroom apartment, is air-conditioned, has a full kitchen ceiling fan, 2 smart TV\'s 65 inch in the leaving room and a 50 inch in the bedroom both with Netflix, full size fridge, Microwave, tea & coffee making facilities, toaster, hair dryer, shower over the bath.\r\n\r\nLaundry facilities wash and dryer are free and available in the apartment.\r\n\r\nLocated between cosmopolitan ‘dining capital’ Broadbeach and the 24hour excitement of Surfers Paradise, Ipanema Holiday Resort sets the scene for an excitement-packed Gold Coast break.\r\n\r\nUnwind in our stylish and spacious Apartments in Gold Coast, situated just minutes from the sun-washed beach and within easy walking or driving distance from the region’s finest family attractions. With a modern gym, sparkling pool, Roman Bath and breath-taking sea views, Ipanema Holiday Resort Gold Coast has been designed with your relaxation in mind.', 'Surfers Paradise, Queensland, Australia', 196.00, '2023-11-18', '2023-11-24', 'apartment', 1, 2, 'Bathtub,\r\nHair dryer,\r\nCleaning products,\r\nShampoo,\r\nConditioner,\r\nBody soap,\r\nHot water,\r\nShower gel', 2, NULL, '\"[\\\"public\\\\\\/listings\\\\\\/ajq4XYnQZmHwBsfmViMZAZOVAgko2pD2vHRod59I.webp\\\",\\\"public\\\\\\/listings\\\\\\/0iXfuz8QxPnKLZwS6JKY5DcUF43PF4I9xJXGYqkM.webp\\\",\\\"public\\\\\\/listings\\\\\\/F2fSsKTo6zKcCoSGgbuByi3YCkh6NTz4Hy1tUqDZ.webp\\\",\\\"public\\\\\\/listings\\\\\\/TDSrGMbVISUxRYsAgGJNhTFAkR24P3yexelfEcYT.webp\\\",\\\"public\\\\\\/listings\\\\\\/IlJU5aueNr0G2e9Ttwr9TkuehkeDkpmyomjCVDQc.webp\\\"]\"', '2023-11-16 22:04:12', '2023-11-16 22:04:12'),
(14, 5, 'Private Bedroom in Resort Style Home', 'WATERFRONT RESORT STYLE HOME WITH LAKE ACCESS & POOL\r\nThe space\r\nThe room is accessible through the garage and features a Queen-sized bed.\r\n\r\nInside the room, you will find a kettle, a bottle of water, tea, and sugar for your morning tea. Guests can also use the mini fridge & microwave located in the garage.\r\n\r\nPlease note that self check-in is available. The bathroom will be shared with another Airbnb room, and we only have a ceiling fan available in the room - no A/C. The kitchen and living room are not included in the rental.\r\n\r\nPlease be aware that the room is adjacent to the home entrance, so if you are a light sleeper, you may hear people coming in and leaving.\r\nGuest access\r\nIn addition to the beautifully decorated private room and shared bathroom, guests are welcome to enjoy the patio area, pool, and lake until 8pm through the side entrance of the house. Please note that the kitchen and living room are not available for guest use.\r\nDuring your stay\r\nI’m more than happy to answer any questions or give you suggestions on places to visit on the Gold Coast\r\nOther things to note\r\n- The bathroom will be shared with another Airbnb room\r\n- No A/C in the room\r\n- Kitchen & living room are not included\r\n- The room is adjacent to the home entrance and you might hear people coming in and leaving\r\n- The bath tub is out of order', 'Clear Island Waters, Queensland, Australia', 200.00, '2023-11-18', '2023-11-19', 'apartment', 2, 2, 'Microwave,\r\nMini fridge,\r\nHot water kettle', 2, 'Enjoy to the fullest!', '\"[\\\"public\\\\\\/listings\\\\\\/mx9o6u6Ede9tIgBFswCG36NIbXtCvcnZEzJrYbq4.webp\\\",\\\"public\\\\\\/listings\\\\\\/rv0ZyXF0FarlTUhfXM1CDy0W3chpUcSaQlPgcudR.webp\\\",\\\"public\\\\\\/listings\\\\\\/xRjrnk69ndohtRMV4uKnTc2JJCQ2EMi9htHgmW1a.webp\\\",\\\"public\\\\\\/listings\\\\\\/blFjf9rTl96fwQC7yFlRmwgB2wy1x3LNyFLxJvd5.webp\\\"]\"', '2023-11-16 22:12:12', '2023-11-16 22:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_11_12_132359_create_users_table', 1),
(18, '2023_11_13_130747_create_listings_table', 1),
(19, '2023_11_17_235119_create_bookings_table', 2),
(20, '2019_05_03_000001_create_customer_columns', 3),
(21, '2019_05_03_000002_create_subscriptions_table', 3),
(22, '2019_05_03_000003_create_subscription_items_table', 3),
(23, '2023_11_19_102939_create_reviews_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `listing_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 3, 8, 'Nice', '2023-11-18 23:42:41', '2023-11-18 23:42:41'),
(2, 2, 13, 'Very Good', '2023-11-18 23:56:51', '2023-11-18 23:56:51'),
(3, 2, 12, 'Excellent', '2023-11-18 23:57:19', '2023-11-18 23:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Super User', 'superuser@koalamama.com', '$2y$12$WXofqC2ZkT7qh4WvZvyDaeIHwCXokapi68dueHO1COctRosPympPO', 'superuser', '2023-11-14 23:52:48', '2023-11-14 23:52:48', NULL, NULL, NULL, NULL),
(2, 'Wai Lyan Pyae', 'wailyanpyae@gmail.com', '$2y$12$GCOBNVVPyOU1ZREiSql/Oe2QGZck4jVwSc1.Qbmu4X2wuyM/1MkGq', 'user', '2023-11-14 23:53:13', '2023-11-19 19:04:17', NULL, NULL, NULL, NULL),
(3, 'Eaint Mie Mie Thant', 'eaintthant@gmail.com', '$2y$12$Mfl87fA4jPyed/5uYbSYGOV6QaDTtPxrN/D3.cdRmnwcKU1FSMZQS', 'user', '2023-11-14 23:56:28', '2023-11-18 21:14:57', NULL, NULL, NULL, NULL),
(4, 'Host Eaint', 'eainthost@koalamama.com', '$2y$12$48aULGzXe3/FaTA24Ongq.K4tSD6R2N3WPr31dPw/s4ZuKoos4Nr2', 'host', '2023-11-14 23:57:58', '2023-11-14 23:57:58', NULL, NULL, NULL, NULL),
(5, 'Wai Lyan Pyae', 'wailyanpyae@koalamama.com', '$2y$12$lSEWGagJCEGao77Lg75pyewbYU5ODN3/xstOsWGj6KiBD99eNKXR6', 'host', '2023-11-16 21:46:03', '2023-11-19 19:36:31', NULL, NULL, NULL, NULL),
(7, 'Myat Paing Thaw', 'myatpaingthaw@gmail.com', '$2y$12$wFFNjPhRa9aXDcNS.88uSuzuZJbmbSNeUNejZLLVe9K/tBkd/c7aa', 'user', '2023-11-19 19:19:13', '2023-11-19 19:19:13', NULL, NULL, NULL, NULL),
(8, 'Angus', 'Angus@gmail.com', '$2y$12$gOb.nDC3cXpMCKTLqcpbR.6qAwnWlEE/ieRx.hcmf5cDSNz1EjFdm', 'user', '2023-11-19 19:39:09', '2023-11-19 19:39:09', NULL, NULL, NULL, NULL),
(9, 'OAK', 'OAK@GMAIL.COM', '$2y$12$rJwpWNXeWPkJcRcHiJ0bneyCy.nluNDm83N9ukiNa558ELRQI0Rvy', 'user', '2023-11-19 19:39:43', '2023-11-19 19:39:43', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
