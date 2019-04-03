var navController = {
    pageContent: document.getElementById("main").dataset.pageContent,
    navItems: document.getElementsByClassName("js-nav-item"),
    setActiveNavItem() {
        numberOfNavItems = this.navItems.length; // use this in For loop to improve performance (JS engine)
        for (var i = 0; i < numberOfNavItems; i++) {
            if (this.navItems[i].dataset.pageContent === this.pageContent) {
                this.navItems[i].classList.add("active");
                // optional break
                // break;
            }
        }
    }
}

navController.setActiveNavItem();