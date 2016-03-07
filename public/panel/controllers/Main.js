function MainCtrl(Rguard) {
    this.title = Rguard.title;
}

rguard.controller('MainCtrl', ['Rguard', MainCtrl]);