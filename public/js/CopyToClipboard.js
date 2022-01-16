function myFunction(ElementID, TooltipID) {
    var copyText = document.getElementById(ElementID);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById(TooltipID);
    tooltip.innerHTML = 'Copied <i class="fa fa-check" aria-hidden="true"></i>';
}

function outFunc() {
    var tooltip = document.getElementById(TooltipID);
    tooltip.innerHTML = "Copy to clipboard";
}