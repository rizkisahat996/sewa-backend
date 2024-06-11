import { Grid, h, html } from "gridjs";
window.gridjs = Grid;

class GridDatatable {
    init() {
        this.basicTableInit();
    }

    basicTableInit() {
        const tableGridElement = document.getElementById("table-gridjs");
        const tableType = tableGridElement.dataset.type;

        if (tableType === "transaction") {
            const transactionsData = JSON.parse(
                tableGridElement.dataset.transactions
            );

            new Grid({
                columns: [
                    {
                        name: "ID",
                        formatter: (cell) =>
                            html(`<span class="fw-semibold">${cell}</span>`),
                    },
                    {
                        name: "Building",
                        formatter: (_, row) =>
                            html(`${row.cells[1].data.description}`),
                    },
                    {
                        name: "Renter",
                        formatter: (_, row) =>
                            html(`${row.cells[2].data.name}`),
                    },
                    {
                        name: "Start Date",
                        formatter: (cell) =>
                            html(new Date(cell).toLocaleString()),
                    },
                    {
                        name: "End Date",
                        formatter: (cell) =>
                            html(new Date(cell).toLocaleString()),
                    },
                    {
                        name: "Total Amount",
                        formatter: (cell) => html(`$${cell.toFixed(2)}`),
                    },
                    {
                        name: "Actions",
                        width: "120px",
                        formatter: (_, row) => {
                            const transactionId = row.cells[0].data;
                            return html(
                                `<a href="/transactions/${transactionId}" class="text-reset text-decoration-underline">Details</a>
                                <a href="/transactions/${transactionId}/edit" class="text-reset text-decoration-underline ms-2">Edit</a>`
                            );
                        },
                    },
                ],
                pagination: { limit: 5 },
                sort: true,
                search: true,
                data: transactionsData.map((transaction) => [
                    transaction.id,
                    transaction.building,
                    transaction.renter,
                    transaction.start_date,
                    transaction.end_date,
                    transaction.total_amount,
                ]),
            }).render(tableGridElement);
        } else if (tableType === "building") {
            const buildingsData = JSON.parse(
                tableGridElement.dataset.buildings
            );

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
                pagination: { limit: 5 },
                sort: true,
                search: true,
                data: buildingsData.map((building) => [
                    building.id,
                    building.description,
                    building.rent_price,
                    building.owner,
                ]),
            }).render(tableGridElement);
        }
    }
}

document.addEventListener("DOMContentLoaded", function (e) {
    new GridDatatable().init();
});
