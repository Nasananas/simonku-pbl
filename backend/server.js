const express = require('express');
const cors = require('cors'); // Import middleware CORS
const app = express();

// Gunakan middleware CORS
app.use(cors());

// Tambahkan rute atau logika aplikasi lainnya di sini
app.get('/', (req, res) => {
  res.send('Halo dari server!');
});

app.get('/iku1', (req, res) => {
  res.send('Ini adalah respons dari endpoint /iku1');
});

// Atur server untuk mendengarkan pada port tertentu
const PORT = process.env.PORT || 8000;
app.listen(PORT, () => {
  console.log(`Server berjalan di port ${PORT}`);
});
