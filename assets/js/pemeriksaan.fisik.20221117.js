let sourceImage, targetRoot, maState, markerArea;

// save references to the original image and its parent div (positioning root)
function setSourceImage(source) {
    if (source) {
        sourceImage = source;
        targetRoot = source.parentElement;
    }
}

function showMarkerArea(target) {
    markerArea = new markerjs2.MarkerArea(sourceImage);
    markerArea.availableMarkerTypes = markerArea.ALL_MARKER_TYPES;
    // since the container div is set to position: relative it is now our positioning root
    // end we have to let marker.js know that
    markerArea.targetRoot = targetRoot;
    markerArea.addEventListener("render", (event) => {
        target.src = event.dataUrl;
        // save the state of MarkerArea
        maState = event.state;
    });
    markerArea.show();
    // if previous state is present - restore it
    if (maState) {
        markerArea.restoreState(maState);
    }
}

setSourceImage(document.getElementById("sourceImage"));

const targetImage = document.getElementById("targetImage");
if (targetImage) {
    targetImage.addEventListener("click", () => {
        showMarkerArea(targetImage);
    });
}


const btnSave = document.getElementById("btnSavePemeriksaanFisik");
if (btnSave) {
    btnSave.addEventListener("click", (e) => {
        console.log(e);
        if (markerArea.isOpen) {
            bootbox.alert({
                centerVertical: true,
                message: "Image editor belum disimpan!",
                size: 'small'
            });
            return false;
        }

        const nama = document.getElementById("inputPemeriksaanFisik");
        const keterangan = document.getElementById("inputKeteranganFisik");
        const image = document.getElementById("targetImage");

        let data = {
            nama: nama.value,
            keterangan: keterangan.value,
            original: "",
            is_delete: 0
        }

        if (image.src.includes("http")) {
            pathToDataUrl(image.src, function(myBase64) {
                data.image = myBase64;
                PemeriksaanFisikRow(data);
            });
        } else {
            data.image = image.src;
            PemeriksaanFisikRow(data);
        }

        maState = null;
        markerArea.clear();
        $('#modal-foto-editor').modal('toggle');

    });
}

function PemeriksaanFisikRow(data) {
    const tbodyRef = document.getElementById('tablePemeriksaanFisik').getElementsByTagName('tbody')[0];
    const empEl = tbodyRef.querySelector('tr td[data-label="empty_row"]');
    if (empEl) {
        empEl.parentElement.remove();
    }

    // Insert a row at the end of table
    const newRow = tbodyRef.insertRow();

    // Insert a cell at the end of the row
    const newCellName = newRow.insertCell();
    const newCellKeterangan = newRow.insertCell();
    const newCellImage = newRow.insertCell();
    const newCellOriginal = newRow.insertCell();
    const newCellDelete = newRow.insertCell();
    const newCellButton = newRow.insertCell();
    // Append a text node to the cell
    newCellName.appendChild(document.createTextNode(data.nama));
    newCellName.setAttribute('data-label', 'nama');

    newCellKeterangan.appendChild(document.createTextNode(data.keterangan));
    newCellKeterangan.setAttribute('data-label', 'keterangan');

    newCellOriginal.appendChild(document.createTextNode(data.original));
    newCellOriginal.setAttribute('data-label', 'original');
    newCellOriginal.setAttribute('class', 'd-none');

    newCellDelete.appendChild(document.createTextNode(data.is_delete));
    newCellDelete.setAttribute('data-label', 'is_delete');
    newCellDelete.setAttribute('class', 'd-none');

    const newImg = document.createElement("img");
    const newImgAttrSrc = document.createAttribute("src");
    newImgAttrSrc.value = data.image;
    newImg.setAttributeNode(newImgAttrSrc);
    const newImgAttrClass = document.createAttribute("class");
    newImgAttrClass.value = "img-fluid";
    newImg.setAttributeNode(newImgAttrClass);
    newCellImage.appendChild(newImg);
    newCellImage.setAttribute('data-label', 'foto');

    const newDiv = document.createElement("div");
    const newDivAttrClass = document.createAttribute("class");
    newDivAttrClass.value = "btn-group btn-group-sm";
    newDiv.setAttributeNode(newDivAttrClass);

    const newBtn = document.createElement("button");
    const newBtnAttrClass = document.createAttribute("class");
    newBtnAttrClass.value = "btn btn-danger btn-delete";
    newBtn.setAttributeNode(newBtnAttrClass);
    const newBtnAttrType = document.createAttribute("type");
    newBtnAttrType.value = "button";
    newBtn.setAttributeNode(newBtnAttrType);

    const newI = document.createElement("i");
    const newIAttrClass = document.createAttribute("class");
    newIAttrClass.value = "fas fa-trash";
    newI.setAttributeNode(newIAttrClass);

    const newCellAttrClass = document.createAttribute("class");
    newCellAttrClass.value = "text-right align-middle";
    newCellButton.setAttributeNode(newCellAttrClass);

    newCellButton.setAttribute('data-label', 'button-delete');
    newBtn.appendChild(newI);
    newDiv.appendChild(newBtn);
    newCellButton.appendChild(newDiv);
}

$(function() {
    $(".simplefilter li").on("click", function() {
        $(".btn[data-filter]").removeClass("active");
        $(this).addClass("active");
    });

    $("#btnBackPemeriksaanFisik").on("click", function() {
        $('#modal-foto').modal('toggle');
        $('#modal-foto-editor').modal('toggle');
    });

    $(".filtr-item").on("click", function() {
        const img = $(this).find('img');
        let sourceImage = $('#sourceImage');
        let targetImage = $('#targetImage');
        sourceImage.attr("src", img.attr('src'));
        targetImage.attr("src", img.attr('src'));
        let inputPemeriksaanFisik = $('#inputPemeriksaanFisik');
        let inputKeteranganFisik = $('#inputKeteranganFisik');
        inputPemeriksaanFisik.val("");
        inputKeteranganFisik.val("");
        $('#modal-foto').modal('toggle');
        $('#modal-foto-editor').modal('toggle');
    });

    $("#modal-foto").on("shown.bs.modal", function(e) {
        requestAnimationFrame(function() {
            // Expose this filterizr as a global for debugging
            $(".simplefilter .fltr-controls:first-child").click();
        });
    });

    $('#tablePemeriksaanFisik').find('tbody').on("click", "td .btn-delete", function() {
        let $target = $('#tablePemeriksaanFisik');
        let $tr = $(this).closest('tr');
        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    if ($tr.find("td:eq(3)").text() === "") {
                        $tr.remove();
                    } else {
                        $tr.find("td:eq(4)").text(1);
                        $tr.addClass("d-none");
                    }
                    if ($target.find('tbody tr').length == 0) {
                        let colspan = $target.find('thead tr th').length;
                        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                    }
                }
            }
        });
    });
});

function pathToDataUrl(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
}

function fillTablePemeriksaanFisik(data) {
    let $tablePemeriksaanFisik = $('#tablePemeriksaanFisik');
    $tablePemeriksaanFisik.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tablePemeriksaanFisik.find('thead tr th').length;
        $tablePemeriksaanFisik.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        pathToDataUrl(value.fullpath, function(myBase64) {
            const data = {
                nama: value.nama_pemeriksaan,
                keterangan: value.keterangan,
                original: value.foto,
                image: myBase64,
                is_delete: value.is_delete
            }
            PemeriksaanFisikRow(data);
        });
    });
}

// Expose this filterizr as a global for debugging
window.filterizr = new window.Filterizr('.filtr-container', {
    controlsSelector: '.fltr-controls',
    gutterPixels: 0,
    filter: 'all',
    layout: 'sameWidth',
    spinner: {
        enabled: true,
    },
});