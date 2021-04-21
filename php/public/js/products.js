let icons = document.getElementsByName('icon')
icons.forEach(icon => {
    icon.addEventListener('mouseenter', function() {
        this.src="icons/comment-icon-hover.svg"
    })
    icon.addEventListener('mouseleave', function() {
        this.src="icons/comment-icon.svg"
    })
});