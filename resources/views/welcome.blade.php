<?php
session_start();
$loggedIn = isset($_SESSION['user_id']); // Cek apakah user sudah login
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daily Notes - Catatan Berkualitas untuk Hidup Lebih Baik</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col justify-center items-center">
  <!-- Container Utama -->
  <div class="max-w-4xl mx-auto px-4 py-8 text-center">
    <!-- Navigation -->
    <nav class="flex justify-between items-center w-full mb-12">
      <h1 class="text-2xl font-bold text-gray-800">
        📔 Daily Notes
      </h1>
      <a href="<?= $loggedIn ? '/dashboard' : '/login' ?>" 
         class="bg-purple-600 text-white px-5 py-2 rounded-lg hover:bg-purple-700 transition">
        <?= $loggedIn ? 'Dashboard' : 'Mulai Gratis' ?>
      </a>
    </nav>

    <!-- Hero Section -->
    <section class="py-16">
      <h2 class="text-4xl font-bold text-gray-800 leading-tight mb-6">
        Catat <span class="text-purple-600">Ide Brilian</span> Anda
      </h2>
      <p class="text-lg text-gray-600 mb-8">
        Simpan catatan dengan mudah, cepat, dan aman dalam satu platform.
      </p>

      <!-- Tombol hanya muncul jika pengguna belum login -->
      <?php if (!$loggedIn): ?>
      <div class="mt-6 flex justify-center gap-4">
        <a href="/register" class="bg-purple-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-purple-700 transition transform hover:scale-105">
          Daftar Sekarang - Gratis
        </a>
      </div>
      <?php endif; ?>
    </section>

    <!-- Quote Motivasi -->
    <div class="mt-12 bg-white p-6 rounded-xl shadow-md border border-gray-100">
      <p class="text-gray-700 text-lg font-semibold">
        "Mencatat adalah langkah pertama untuk mewujudkan impian besar."
      </p>
      <p class="text-gray-500 text-sm mt-2">- Daily Notes</p>
    </div>

    <!-- Footer -->
    <footer class="mt-16 border-t border-gray-200 pt-8">
      <p class="text-gray-600">
        © <?= date("Y"); ?> Daily Notes. All rights reserved.
      </p>
    </footer>
  </div>
</body>
</html>
