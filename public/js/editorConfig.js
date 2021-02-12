ClassicEditor.create(document.querySelector("#editor"), {
    toolbar: {
        items: [
            "heading",
            "|",
            "bold",
            "italic",
            "link",
            "bulletedList",
            "numberedList",
            "alignment",
            "|",
            "indent",
            "outdent",
            "|",
            // "imageInsert",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "undo",
            "redo",
            "|",
            "fontBackgroundColor",
            "fontColor",
            "fontSize",
            "fontFamily",
            "highlight",
            "horizontalLine",
            "underline",
            "|",
            "MathType"
        ]
    },
    language: "es",
    image: {
        styles: ["alignLeft", "alignCenter", "alignRight"],

        // Configure the available image resize options.
        resizeOptions: [
            {
                name: "imageResize:original",
                label: "Original",
                value: null
            },
            {
                name: "imageResize:50",
                label: "50%",
                value: "50"
            },
            {
                name: "imageResize:75",
                label: "75%",
                value: "75"
            }
        ],

        // You need to configure the image toolbar, too, so it shows the new style
        // buttons as well as the resize buttons.
        toolbar: [
            "imageStyle:alignLeft",
            "imageStyle:alignCenter",
            "imageStyle:alignRight",
            "|",
            "imageResize",
            "|",
            "imageTextAlternative"
        ]
    },
    table: {
        contentToolbar: [
            "tableColumn",
            "tableRow",
            "mergeTableCells",
            "tableCellProperties",
            "tableProperties"
        ]
    },
    licenseKey: ""
})
    .then(newEditor => {
        editor = newEditor;
    })
    .catch(error => {
        console.error(error);
    });
