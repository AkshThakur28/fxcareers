$(document).ready(function () {
    $('#coursesTable').DataTable({
        columnDefs: [
            {
                targets: [2, 3, 4], // Columns: SEO Title, SEO Keywords, SEO Description
                render: function (data, type, row) {
                    if (type === 'display' && data) {
                        const wordLimit = 6; // Adjust the word limit
                        const words = data.split(' ');
                        return words.length > wordLimit 
                            ? words.slice(0, wordLimit).join(' ') + '...' 
                            : data;
                    }
                    return data;
                }
            }
        ]
    });
});

$(document).ready(function () {
    $('#SeoTable').DataTable({
        columnDefs: [
            {
                targets: [2, 3, 4], // Columns: SEO Title, SEO Keywords, SEO Description
                render: function (data, type, row) {
                    if (type === 'display' && data) {
                        const wordLimit = 6; // Adjust the word limit
                        const words = data.split(' ');
                        return words.length > wordLimit 
                            ? words.slice(0, wordLimit).join(' ') + '...' 
                            : data;
                    }
                    return data;
                }
            }
        ]
    });
});