// выберите все div с классом "audio-container" на странице
const audioContainers = document.querySelectorAll('.audio-container');

// для каждого div с классом "audio-container" найдите кнопку "Play"
audioContainers.forEach((container) => {
  const playButton = container.querySelector('.btn-outline');
  
  // если кнопка "Play" найдена, добавьте обработчик события "click"
  if (playButton) {
    // найти соответствующий аудиофайл в div
    const audio = container.querySelector('audio');

    // добавить обработчик события "click" на кнопку "Play"
    playButton.addEventListener('click', () => {
      // проверить, воспроизводится ли уже аудиофайл
      if (audio.paused) {
        // если аудиофайл не воспроизводится, включить его и изменить текст кнопки на "Pause"
        audio.play();
        playButton.textContent = 'Pause';
      } else {
        // если аудиофайл уже воспроизводится, остановить его и изменить текст кнопки на "Play"
        audio.pause();
        playButton.textContent = 'Play';
      }
    });
  }
});