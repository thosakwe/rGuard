function LicensesCtrl(User) {
    var self = this;
    this.licenses = [];
    this.loading = true;
    this.selected = null;
    this.selectedIndex = -1;

    this.select = function (index) {
        self.selectedIndex = index;
        self.selected = self.licenses[index];
    };

    var init = function () {
        User.get().success(function (user) {
            self.licenses = user.licenses;
            if (self.licenses.length > 0)
                self.select(0);
        }).finally(function () {
            self.loading = false;
        });
    };

    init();
}
rguard.controller('LicensesCtrl', ['User', LicensesCtrl]);