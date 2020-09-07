<template>
    <div>
        <div
            class="vue-back-to-top"
            style="bottom: 5%; right: 30px; display: none;"
        >
            <button
                type="button"
                name="button"
                class="vs-component vs-button shadow-lg btn-back-to-top vs-button-primary vs-button-filled includeIcon includeIconOnly"
            >
                <span
                    class="vs-button-backgroundx vs-button--background"
                    style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"
                ></span
                ><i
                    class="vs-icon notranslate icon-scale vs-button--icon  feather icon-arrow-up null"
                    style="order: 0; margin-right: 0px; margin-left: 0px;"
                ></i
                ><!----><span
                    class="vs-button-linex"
                    style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"
                ></span>
            </button>
        </div>
        <div id="invoice-page">
            <div class="flex flex-wrap items-center justify-between">
                <div class="vx-input-group flex mb-base mr-3">
                    <!---->
                    <div class="vx-input-group-default flex-grow">
                        <div
                            class="vs-component vs-con-input-label vs-input vs-input-primary"
                        >
                            <!---->
                            <div class="vs-con-input">
                                <input
                                    type="text"
                                    class="vs-inputx vs-input--input normal"
                                    style="border: 1px solid rgba(0, 0, 0, 0.2);"
                                /><span
                                    class="input-span-placeholder vs-input--placeholder normal"
                                >
                                    Email </span
                                ><!----><!---->
                            </div>
                            <span></span>
                        </div>
                    </div>
                    <div class="vx-input-group-append flex">
                        <div class="append-text btn-addon">
                            <button
                                type="button"
                                name="button"
                                class="vs-component vs-button whitespace-no-wrap vs-button-primary vs-button-border"
                                style="background: transparent none repeat scroll 0% 0%;"
                            >
                                <span
                                    class="vs-button-backgroundx vs-button--background"
                                    style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"
                                ></span
                                ><!----><span
                                    class="vs-button-text vs-button--text"
                                    >Send Invoice</span
                                ><span
                                    class="vs-button-linex"
                                    style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"
                                ></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <button
                        type="button"
                        name="button"
                        class="vs-component vs-button mb-base mr-3 vs-button-primary vs-button-border includeIcon"
                        style="background: transparent none repeat scroll 0% 0%;"
                    >
                        <span
                            class="vs-button-backgroundx vs-button--background"
                            style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"
                        ></span
                        ><i
                            class="vs-icon notranslate icon-scale vs-button--icon  feather icon icon-download null"
                            style="order: 0; margin-right: 5px; margin-left: 0px;"
                        ></i
                        ><span class="vs-button-text vs-button--text"
                            >Download</span
                        ><span
                            class="vs-button-linex"
                            style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"
                        ></span>
                    </button>
                    <button
                        type="button"
                        @click="print"
                        name="button"
                        class="vs-component vs-button mb-base mr-3 vs-button-primary vs-button-filled includeIcon"
                    >
                        <span
                            class="vs-button-backgroundx vs-button--background"
                            style="opacity: 1; left: 39px; top: 18px; width: 0px; height: 0px; transition: width 0s ease 0s, height 0s ease 0s, opacity 0s ease 0s;"
                        ></span
                        ><i
                            class="vs-icon notranslate icon-scale vs-button--icon  feather icon icon-file null"
                            style="order: 0; margin-right: 5px; margin-left: 0px;"
                        ></i
                        ><span class="vs-button-text vs-button--text"
                            >Print</span
                        ><span
                            class="vs-button-linex"
                            style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"
                        ></span>
                    </button>
                </div>
            </div>
            <div class="vx-card">
                <!---->
                <div
                    class="vx-card__collapsible-content vs-con-loading__container"
                >
                    <div class="vx-card__body" id="invoice-container">
                        <div class="vx-row leading-loose p-base">
                            <div class="vx-col w-full md:w-1/2 text-left">
                                <img
                                    src="@assets/images/logo/1.png"
                                    alt="vuexy-logo"
                                />
                            </div>
                            <div class="vx-col w-full md:w-1/2 ">
                                <h1>Invoice</h1>
                                <div class="invoice__invoice-detail mt-6">
                                    <h6>INVOICE NO.</h6>
                                    <p>001/2019</p>
                                    <h6 class="mt-4">INVOICE DATE</h6>
                                    <p>10 Dec 2018</p>
                                </div>
                            </div>
                            <div class="vx-col w-full md:w-1/2 mt-12">
                                <h5>Recipient</h5>
                                <div class="invoice__recipient-info my-4">
                                    <p>Peter Stark</p>
                                    <p>8577 West West Drive</p>
                                    <p>Holbrook, NY</p>
                                    <p>90001</p>
                                </div>
                                <div class="invoice__recipient-contact ">
                                    <p class="flex items-center">
                                        <span
                                            class="feather-icon select-none relative"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-mail h-4 w-4"
                                            >
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                                ></path>
                                                <polyline
                                                    points="22,6 12,13 2,6"
                                                ></polyline></svg
                                        ></span>
                                        <span class="ml-2">peter@mail.com</span>
                                    </p>
                                    <p class="flex items-center">
                                        <span
                                            class="feather-icon select-none relative"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-phone h-4 w-4"
                                            >
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                ></path></svg
                                        ></span>
                                        <span class="ml-2"
                                            >+91 988 888 8888</span
                                        >
                                    </p>
                                </div>
                            </div>
                            <div
                                class="vx-col w-full md:w-1/2 mt-base text-right mt-12"
                            >
                                <h5>Microsion Technologies Pvt. Ltd.</h5>
                                <div class="invoice__company-info my-4">
                                    <p>9 N. Sherwood Court</p>
                                    <p>Elyria, OH</p>
                                    <p>94203</p>
                                </div>
                                <div class="invoice__company-contact">
                                    <p class="flex items-center justify-end">
                                        <span
                                            class="feather-icon select-none relative"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-mail h-4 w-4"
                                            >
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                                ></path>
                                                <polyline
                                                    points="22,6 12,13 2,6"
                                                ></polyline></svg
                                        ></span>
                                        <span class="ml-2"
                                            >hello@pixinvent.net</span
                                        >
                                    </p>
                                    <p class="flex items-center justify-end">
                                        <span
                                            class="feather-icon select-none relative"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-phone h-4 w-4"
                                            >
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                ></path></svg
                                        ></span>
                                        <span class="ml-2"
                                            >+91 999 999 9999</span
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-base">
                            <div
                                class="vs-component vs-con-table hoverFlat vs-table-primary"
                            >
                                <header class="header-table vs-table--header">
                                    <!---->
                                </header>
                                <div class="con-tablex vs-table--content">
                                    <div class="vs-con-tbody vs-table--tbody ">
                                        <table
                                            class="vs-table vs-table--tbody-table"
                                        >
                                            <thead class="vs-table--thead">
                                                <tr>
                                                    <!---->
                                                    <th colspan="1" rowspan="1">
                                                        <div
                                                            class="vs-table-text"
                                                        >
                                                            TASK DESCRIPTION<!---->
                                                        </div>
                                                    </th>
                                                    <th colspan="1" rowspan="1">
                                                        <div
                                                            class="vs-table-text"
                                                        >
                                                            HOURS<!---->
                                                        </div>
                                                    </th>
                                                    <th colspan="1" rowspan="1">
                                                        <div
                                                            class="vs-table-text"
                                                        >
                                                            RATE<!---->
                                                        </div>
                                                    </th>
                                                    <th colspan="1" rowspan="1">
                                                        <div
                                                            class="vs-table-text"
                                                        >
                                                            AMOUNT<!---->
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tr
                                                class="tr-values vs-table--tr tr-table-state-null hoverFlat"
                                            >
                                                <!---->
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->Website Redesign<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->60<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->15 USD<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->90000 USD<!----></span
                                                    >
                                                </td>
                                            </tr>
                                            <tr
                                                class="tr-values vs-table--tr tr-table-state-null hoverFlat"
                                            >
                                                <!---->
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->Newsletter
                                                        template design<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->20<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->12 USD<!----></span
                                                    >
                                                </td>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->24000 USD<!----></span
                                                    >
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!----><!---->
                                </div>
                            </div>
                            <div
                                class="vs-component vs-con-table w-1/2 ml-auto mt-4 hoverFlat vs-table-primary"
                            >
                                <header class="header-table vs-table--header">
                                    <!---->
                                </header>
                                <div class="con-tablex vs-table--content">
                                    <div class="vs-con-tbody vs-table--tbody ">
                                        <table
                                            class="vs-table vs-table--tbody-table"
                                        >
                                            <thead class="vs-table--thead">
                                                <tr>
                                                    <!---->
                                                </tr>
                                            </thead>
                                            <tr
                                                class="tr-values vs-table--tr tr-table-state-null hoverFlat"
                                            >
                                                <!---->
                                                <th colspan="1" rowspan="1">
                                                    <div class="vs-table-text">
                                                        SUBTOTAL<!---->
                                                    </div>
                                                </th>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->114000 USD<!----></span
                                                    >
                                                </td>
                                            </tr>
                                            <tr
                                                class="tr-values vs-table--tr tr-table-state-null hoverFlat"
                                            >
                                                <!---->
                                                <th colspan="1" rowspan="1">
                                                    <div class="vs-table-text">
                                                        DISCOUNT (5%)<!---->
                                                    </div>
                                                </th>
                                                <td class="td vs-table--td">
                                                    <span
                                                        ><!---->5700 USD<!----></span
                                                    >
                                                </td>
                                            </tr>
                                            <tr
                                                class="tr-values vs-table--tr tr-table-state-null hoverFlat"
                                            >
                                                <!---->
                                                <th>TOTAL</th>
                                                <td>108300 USD</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!----><!---->
                                </div>
                            </div>
                        </div>
                        <div class="invoice__footer text-right p-base">
                            <p class="mb-4">
                                Transfer the amounts to the business amount
                                below. Please include invoice number on your
                                check.
                            </p>
                            <p>
                                <span class="mr-8"
                                    >BANK:
                                    <span class="font-semibold"
                                        >FTSBUS33</span
                                    ></span
                                >
                                <span
                                    >IBAN:
                                    <span class="font-semibold">
                                        G882-1111-2222-3333
                                    </span></span
                                >
                            </p>
                        </div>
                    </div>
                    <!---->
                </div>
                <div
                    class="vx-card__code-container collapsed"
                    style="max-height: 0px; display: none;"
                >
                    <div class="code-content">
                        <pre
                            class="language-markup"
                        ><code class="language-markup"></code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from "vue";
import VueHtmlToPaper from "vue-html-to-paper";

const options = {
    name: "_blank",
    specs: ["fullscreen=yes", "titlebar=yes", "scrollbars=yes"],
    styles: [
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
        "https://unpkg.com/kidlat-css/css/kidlat.css"
    ]
};
Vue.use(VueHtmlToPaper, options);
export default {
    data() {
        return {
            output: null
        };
    },
    methods: {
        print() {
            // Pass the element id here
            this.$htmlToPaper("invoice-container");
        }
    }
};
</script>
