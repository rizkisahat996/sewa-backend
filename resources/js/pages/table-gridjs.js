import { Grid, h, html } from "gridjs";
window.gridjs = Grid;

class GridDatatable {
    init() {
        this.basicTableInit();
    }

    basicTableInit() {
        const buildingsData = JSON.parse(
            document.getElementById("table-gridjs").dataset.buildings
        );

        // Basic Table
        if (document.getElementById("table-gridjs"))
            new Grid({
                columns: [
                    {
                        name: "ID",
                        formatter: (cell) =>
                            html(`<span class="fw-semibold">${cell}</span>`),
                    },
                    "Description",
                    {
                        name: "Rent Price",
                        formatter: (cell) => html(`$${cell}`),
                    },
                    {
                        name: "Owner",
                        formatter: (_, row) =>
                            html(`${row.cells[3].data.name}`),
                    },
                    {
                        name: "Actions",
                        width: "120px",
                        formatter: (_, row) => {
                            const buildingId = row.cells[0].data;
                            return html(
                                `<a href="/buildings/${buildingId}/edit" class="text-reset text-decoration-underline">Details</a>`
                            );
                        },
                    },
                ],
                pagination: {
                    limit: 5,
                },
                sort: true,
                search: true,
                data: buildingsData.map((building) => [
                    building.id,
                    building.description,
                    building.rent_price,
                    building.owner,
                ]),
            }).render(document.getElementById("table-gridjs"));
    }
}

document.addEventListener("DOMContentLoaded", function (e) {
    new GridDatatable().init();
});
