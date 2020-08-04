<script>
window.addEventListener("keydown", ev => {
    switch( true ) {
      /* Previne F12 */
      case ev.keyCode === 123:
      
      /* Previne Ctrl + Shift +  */
      case ev.ctrlKey && ev.shiftKey && event.keyCode == 74:
      
      /* Previne Ctrl + U */
      case ev.ctrlKey && ev.keyCode == 85:
        console.log("Tecla bloqueada");
        ev.preventDefault();
        return false;
    }
  })
  
  /* Previne clique direito do mouse */
  window.addEventListener("contextmenu", ev => {
    ev.preventDefault();
    return false;
  });
</script>