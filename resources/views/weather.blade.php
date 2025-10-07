<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuaca Ibu Kota Provinsi</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      margin: 0;
      padding: 40px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #333;
    }

    h1 {
      text-align: center;
      font-size: 2.4rem;
      color: #0d47a1;
      margin-bottom: 40px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      max-width: 1200px;
      width: 100%;
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 20px;
      text-align: center;
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .city {
      font-size: 1.4rem;
      font-weight: 600;
      color: #1565c0;
      margin-bottom: 10px;
    }

    .temp {
      font-size: 2.5rem;
      font-weight: 700;
      color: #0d47a1;
    }

    .condition {
      margin-top: 5px;
      font-size: 1rem;
      color: #555;
    }

    .time {
      margin-top: 10px;
      font-size: 0.9rem;
      color: #666;
    }

    /* animasi ikon */
    .icon {
      font-size: 3rem;
      margin-bottom: 8px;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-6px); }
    }
  </style>
</head>
<body>
  <h1>🌤️ Cuaca Ibu Kota Provinsi di Indonesia 🌤️</h1>

  <div class="grid">
    @foreach ($weatherData as $city => $data)
      <div class="card">
        @if ($data['condition'] == 'Cerah')
          <div class="icon">☀️</div>
        @elseif ($data['condition'] == 'Berawan')
          <div class="icon">🌤️</div>
        @elseif ($data['condition'] == 'Hujan')
          <div class="icon">🌧️</div>
        @elseif ($data['condition'] == 'Hujan Lebat')
          <div class="icon">⛈️</div>
        @else
          <div class="icon">🌦️</div>
        @endif

        <div class="city">{{ $city }}</div>
        <div class="temp">{{ $data['temp'] }}°C</div>
        <div class="condition">{{ $data['condition'] }}</div>
        <div class="time" id="time-{{ Str::slug($city) }}"></div>
      </div>
    @endforeach
  </div>

  <script>
    // Jam real-time sesuai zona waktu pengguna
    function updateTime() {
      const now = new Date();
      const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
      const formatted = now.toLocaleTimeString('id-ID', options);
      document.querySelectorAll('[id^="time-"]').forEach(el => {
        el.textContent = `🕒 ${formatted} WIB`;
      });
    }
    setInterval(updateTime, 1000);
    updateTime();
  </script>
</body>
</html>
