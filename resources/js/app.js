import './bootstrap';
import 'bootstrap'
import 'boxicons'
function initSidebarToggle() {
  const hamBurger = document.querySelector(".toggle-btn");
  if (!hamBurger) return; // Cegah error jika elemen tidak ditemukan

  hamBurger.removeEventListener("click", toggleSidebar); // Hapus listener lama agar tidak duplikat
  hamBurger.addEventListener("click", toggleSidebar);
}

function toggleSidebar() {
  document.querySelector("#sidebar").classList.toggle("collapsed");
}

// Pasang event listener pertama kali saat halaman dimuat
document.addEventListener("DOMContentLoaded", initSidebarToggle);

// Pasang ulang setiap kali navigasi Livewire terjadi
document.addEventListener("livewire:navigated", initSidebarToggle);
