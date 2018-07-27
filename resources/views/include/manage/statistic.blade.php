<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number">{{countMonthClients()}} </h2>
                    <span class="desc">Month Clients</span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>

                </div>                
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number">NGN {{ number_format(sumMonthTransaction()) }}</h2>                    
                    <span class="desc">Month Transactions</span>
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number">NGN {{ number_format(sumMonthExpenditure())}}</h2>
                    <span class="desc">Month Expenses</span>
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number">NGN {{number_format(sumMonthTransaction() - sumMonthExpenditure())}}</h2>
                    <span class="desc">Month Profit</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>