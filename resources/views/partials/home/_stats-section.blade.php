@php
$stats = [
    ['id' => 1, 'name' => 'Creators on the platform', 'value' => '8,000+'],
    ['id' => 2, 'name' => 'Flat platform fee', 'value' => '3%'],
    ['id' => 3, 'name' => 'Uptime guarantee', 'value' => '99.9%'],
    ['id' => 4, 'name' => 'Paid out to creators', 'value' => '$70M'],
];

$timeline = [
    ['name' => 'Founded company', 'description' => 'Nihil aut nam. Dignissimos a pariatur et quos omnis. Aspernatur asperiores et dolorem dolorem optio voluptate repudiandae.', 'date' => 'Aug 2021', 'datetime' => '2021-08'],
    ['name' => 'Secured $65m in funding', 'description' => 'Provident quia ut esse. Vero vel eos repudiandae aspernatur. Cumque minima impedit sapiente a architecto nihil.', 'date' => 'Dec 2021', 'datetime' => '2021-12'],
    ['name' => 'Released beta', 'description' => 'Sunt perspiciatis incidunt. Non necessitatibus aliquid. Consequatur ut officiis earum eum quia facilis. Hic deleniti dolorem quia et.', 'date' => 'Feb 2022', 'datetime' => '2022-02'],
    ['name' => 'Global launch of product', 'description' => 'Ut ipsa sint distinctio quod itaque nam qui. Possimus aut unde id architecto voluptatem hic aut pariatur velit.', 'date' => 'Dec 2022', 'datetime' => '2022-12'],
];
@endphp

<section class="pt-24">
  <div class="mx-auto max-w-7xl px-6 md:px-0">
    <div class="mx-auto max-w-2xl lg:max-w-none">
      <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-primaryText sm:text-4xl">Trusted by creators worldwide</h2>
        <p class="mt-4 text-lg leading-8 text-primaryTextNeutral">Lorem ipsum dolor sit amet consect adipisicing possimus.</p>
      </div>
      <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($stats as $stat)
        <div class="flex flex-col bg-onPrimaryBg/5 p-8 text-primaryText">
          <dt class="text-sm font-semibold leading-6">{{ $stat['name'] }}</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight">{{ $stat['value'] }}</dd>
        </div>
        @endforeach
      </dl>
    </div>
  </div>

  <div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-0">
      <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8 overflow-hidden lg:mx-0 lg:max-w-none lg:grid-cols-4">
        @foreach ($timeline as $item)
        <div>
          <time datetime="{{ $item['datetime'] }}" class="flex items-center text-sm font-semibold leading-6 text-primary-500">
            <svg viewBox="0 0 4 4" class="mr-4 h-1 w-1 flex-none" aria-hidden="true">
              <circle cx="2" cy="2" r="2" fill="currentColor" />
            </svg>
            {{ $item['date'] }}
            <div class="absolute -ml-2 h-px w-screen -translate-x-full bg-onPrimaryBg/50 sm:-ml-4 lg:static lg:-mr-6 lg:ml-8 lg:w-auto lg:flex-auto lg:translate-x-0" aria-hidden="true"></div>
          </time>
          <p class="mt-6 text-lg font-semibold leading-8 tracking-tight text-neutralText">{{ $item['name'] }}</p>
          <p class="mt-1 text-base leading-7 text-primaryText/90">{{ $item['description'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
