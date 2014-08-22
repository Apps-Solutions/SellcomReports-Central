function PaginacionSubmit(i, por, order)
{
    document.paginar.page.value = i;
    document.paginar.por.value = por;
    document.paginar.order.value = order;
    document.paginar.submit();

}
