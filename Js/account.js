// Получаем ссылки на элементы навигации и разделы
const navigationItems = document.querySelectorAll('.navigation li');
const sections = document.querySelectorAll('.section');

// Обрабатываем клик на каждом пункте навигации
navigationItems.forEach((item, index) => {
  item.addEventListener('click', () => {
    // Удаляем класс 'active' у всех пунктов навигации и разделов
    navigationItems.forEach((navItem) => {
      navItem.classList.remove('active');
    });
    sections.forEach((section) => {
      section.classList.remove('active');
    });

    // Добавляем класс 'active' только к выбранному пункту навигации и соответствующему разделу
    item.classList.add('active');
    sections[index].classList.add('active');
  });
});
