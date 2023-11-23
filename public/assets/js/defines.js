var colors = {
    primary: $('.colors .bg-primary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    primaryLight: $('.colors .bg-primary-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    secondary: $('.colors .bg-secondary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    secondaryLight: $('.colors .bg-secondary-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    info: $('.colors .bg-info').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    infoLight: $('.colors .bg-info-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    success: $('.colors .bg-success').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    successLight: $('.colors .bg-success-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    danger: $('.colors .bg-danger').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    dangerLight: $('.colors .bg-danger-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    warning: $('.colors .bg-warning').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    warningLight: $('.colors .bg-warning-bright').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(',')
};

var rgbToHex = function (rgb) {
    var hex = Number(rgb).toString(16);
    if (hex.length < 2) {
        hex = "0" + hex;
    }
    return hex;
};

var fullColorHex = function (r, g, b) {
    var red = rgbToHex(r);
    var green = rgbToHex(g);
    var blue = rgbToHex(b);
    return red + green + blue;
};

colors.primary = '#' + fullColorHex(colors.primary[0], colors.primary[1], colors.primary[2]);
colors.secondary = '#' + fullColorHex(colors.secondary[0], colors.secondary[1], colors.secondary[2]);
colors.info = '#' + fullColorHex(colors.info[0], colors.info[1], colors.info[2]);
colors.success = '#' + fullColorHex(colors.success[0], colors.success[1], colors.success[2]);
colors.danger = '#' + fullColorHex(colors.danger[0], colors.danger[1], colors.danger[2]);
colors.warning = '#' + fullColorHex(colors.warning[0], colors.warning[1], colors.warning[2]);

var chartColors = {
    primary: {
        base: '#3f51b5',
        light: '#c0c5e4'
    },
    danger: {
        base: '#f2125e',
        light: '#fcd0df'
    },
    success: {
        base: '#0acf97',
        light: '#cef5ea'
    },
    warning: {
        base: '#ff8300',
        light: '#ffe6cc'
    },
    info: {
        base: '#00bcd4',
        light: '#e1efff'
    },
    dark: '#37474f',
    facebook: '#3b5998',
    twitter: '#55acee',
    linkedin: '#0077b5',
    instagram: '#517fa4',
    whatsapp: '#25D366',
    dribbble: '#ea4c89',
    google: '#DB4437',
    borderColor: '#e8e8e8',
    fontColor: '#999'
};
