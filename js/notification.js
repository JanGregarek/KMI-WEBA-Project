const fadeOutEffect = (opacity = 1, delay = 30, decrement = 0.01) => {
    const notification = document.getElementById("notification")
  if (opacity > 0) {
    notification.style.opacity = opacity
    setTimeout(() => fadeOutEffect(opacity - decrement, delay, decrement), delay)
  }
  else {
    notification.style.display = "none"
  }
};

fadeOutEffect();