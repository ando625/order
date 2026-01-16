<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $main = Category::where('name','メインディッシュ')->first();
        $side = Category::where('name', 'サイドメニュー＆スナック')->first();
        $drink = Category::where('name', 'ドリンク＆デザート')->first();

        $menus = [
            [
            'category_id' => $main->id,
            'name' => 'アンバー・キング',
            'price' => 1680,
            'description' => '厳選された和牛ブレンドのパティを贅沢に2枚。肉本来の旨味を閉じ込めるよう強火で一気に焼き上げ、溢れ出す肉汁を濃厚なダブルチェダーチーズが包み込みます。特製のビターチョコレートを隠し味に加えたブラウンソースが、茶色ベースの空間に溶け合う深いコクを演出。最後の一口まで贅沢が止まらない、当店の至宝です。',
            'image_path' =>'images/menus/Whamburger.jpg',
            'is_active' => true,

            ],
        [
            'category_id' => $main->id,
            'name' => 'ザ・ゴールデン・プライム',
            'price' => 1480,
            'description' => '熟成された赤身肉の旨味をダイレクトに感じるシングルパティ。新鮮なトマト、レッドオニオン、そしてシャキシャキのレタスが織りなす色彩は、まさに宝石箱のよう。素材一つ一つの個性が、濃厚なチェダーチーズと特製バンズによって見事に調和した、テイクアウトの概念を覆す至高の一皿です。',
            'image_path' => 'images/menus/hamburger.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'ミッドナイト・コンボ',
            'price' => 2100,
            'description' => '自慢のバーガーに、カリッと揚げた黄金ポテトとキンキンに冷えたコーラを添えて。最高のご褒美を。',
            'image_path' =>'images/menus/SetMenu.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '黄金ダブル・グリル',
            'price' => 1200,
            'description' => 'パキッと弾けるジューシーな特製ソーセージを2本贅沢に。スパイスの効いたマスタードが食欲を刺激します。',
            'image_path' =>'images/menus/HotDog.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '黒毛和牛のグリル (200g)',
            'price' => 2800,
            'description' => '絶妙な火入れで閉じ込めた赤身の旨味。添えられたハーブの香りが食欲をそそる、ディナーの主役にふさわしい王道のサーロインステーキです。',
            'image_path' => 'images/menus/steki.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'リブアイステーキ (500g)',
            'price' => 5400,
            'description' => '500gという圧倒的な存在感。鮮やかなハーブバターソースが、ダークなテーブルの上で美しくコントラストを描きます。肉の本質を味わいたい方のための至高の一皿。',
            'image_path' => 'images/menus/steki2.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'バーボン・スペアリブ',
            'price' => 3200,
            'description' => '特製のダークソースを何度も塗り重ね、じっくりとスモーク。骨からホロリと外れる驚きの柔らかさは、まさに熟練の技が光る贅沢な味わいです。',
            'image_path' => 'images/menus/supea.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'プロフェシー・ラップ',
            'price' => 1580,
            'description' => '熟成されたお肉と新鮮な野菜を、魔法の呪文で包み込むように丁寧に巻き上げました。溢れ出す秘伝のホワイトソースが、複雑で深い味わいの予言（プロフェシー）を授けます。',
            'image_path' =>'images/menus/tortilla.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'サンセット・フィースト',
            'price' => 1320,
            'description' => '黄金色に焼き上げたチキンに、ライムの魔法をひと振り。夕焼け（サンセット）のように鮮やかな野菜とパクチーが、口の中で爽やかな宴（フィースト）を繰り広げます。',
            'image_path' =>'images/menus/ChickenTacos.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'アズテック・ゴールド',
            'price' => 1750,
            'description' => '古代の秘宝を思わせる、スパイス香る牛挽肉のタコス。濃厚なワカモレとサルサの刺激が、眠っていた食欲を呼び覚ます、まさに「黄金」と呼ぶにふさわしい贅沢な3ピースです。',
            'image_path' =>'images/menus/tacos.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '王妃のマルゲリータ',
            'price' => 1850,
            'description' => 'イタリア王妃に捧げられた伝統のレシピ。フレッシュトマトのルビーのような輝きと、芳醇なモッツァレラ、そして摘みたてバジルの香りが、お口の中で鮮やかに踊ります。',
            'image_path' =>'images/menus/margherita.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '真夜中のサラミピザ',
            'price' => 2100,
            'description' => 'とろけ出す濃厚なチーズの海に、スパイシーなサラミの赤（クリムゾン）が映える、禁断の夜食。最後の一口までチーズが伸び続ける、至福のエンターテインメントです。',
            'image_path' =>'images/menus/SalamiPizza.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'アルケミスト・ガーデン',
            'price' => 2350,
            'description' => '色とりどりの野菜、熟成肉、オリーブを贅沢に散りばめた、まさに「錬金術師の庭」のような一皿。複雑に絡み合う素材の旨味が、一口ごとに異なる驚きを与えてくれます。',
            'image_path' =>'images/menus/MixPizza.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'チキンシーザーピザ',
            'price' => 2200,
            'description' => '香ばしく焼き上げたグリルチキンとトマトの上に、新鮮なロメインレタスと雪のようなパルメザンを山盛りに。サラダの爽やかさとピザの重厚感が共鳴する、新感覚の贅沢です。',
            'image_path' =>'images/menus/ChickenPizza.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'エッグ・パンドミ',
            'price' => 1400,
            'description' => '丁寧に焼き色をつけた食パンに、とろける半熟卵と厚切りハムをサンド。溢れ出す黄金の黄身が、ダークな背景に宝石のように浮かび上がる、ポテトを添え朝の贅沢を凝縮した一皿です。',
            'image_path' => 'images/menus/Sando.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'ガーデン・サンド',
            'price' => 1850,
            'description' => '3枚の白い食パンをサクッとトーストし、新鮮なトマトとレタスを層にしました。ポテトを添えたこのセットは、高級感漂う店内でひときわ白く輝き、清潔感と鮮やかさを演出します。',
            'image_path' => 'images/menus/SandwichSet.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'ホワイトタワー・B.L.T.',
            'price' => 1950,
            'description' => '贅沢に重ねたベーコンとレタス、そして厚みのある食パンが生み出す圧倒的なボリューム。白いパンの断面が、ダークブラウンのテーブルの上で美しいコントラストを描く、至高のサンドイッチです。',
            'image_path' => 'images/menus/sandwich.jpg',
            'is_active' => true,
        ],



        [
            'category_id' => $side->id,
            'name' => 'リネン・フライ',
            'price' => 680,
            'description' => '丁寧に手焼きしたような、温かみのあるフレンチフライ。リネンの布に包まれた、まるで休日のピクニックのような贅沢なひとときを。ハーブソルトの香りが魔法のように広がります。',
            'image_path' => 'images/menus/poteto.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'トレジャー・ポテト',
            'price' => 750,
            'description' => '溢れんばかりのポテトを特製ボックスに詰め込んだ、まさに「食の宝箱」。みんなでシェアするのも良し、独り占めするのも良し。最後までカリカリ感が続く魔法のカットです。',
            'image_path' => 'images/menus/poteto2.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'ゴールド・チーズディップ',
            'price' => 780,
            'description' => 'まるで魔法で溶かした「金（ゴールド）」のような、超濃厚チェダーチーズソース。香ばしいトルティーヤチップスを添えて。一口食べれば、そのコク深い味わいに誰もが魅了される禁断のサイドメニューです。',
            'image_path' => 'images/menus/CheeseSauce.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'パッチ・ナゲット',
            'price' => 850,
            'description' => '魔法の紙に包まれた、外はカリッと中は驚くほどジューシーな特製ナゲット。一口噛めば、特製ディップソースとの完璧なハーモニーが口いっぱいに広がります。',
            'image_path' =>'images/menus/nugget.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'クリスピーチキン',
            'price' => 1200,
            'description' => '厳選されたハーブとスパイスを配合した独自の衣で、驚くほど軽やかな食感に仕上げました。噛むたびに溢れる肉汁と香りが、深いコクのあるブラウンの背景に映える一品です。',
            'image_path' => 'images/menus/Chikin2.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'デラックス・ナチョス',
            'price' => 1100,
            'description' => 'カリッと揚げたチップスに、濃厚なとろけるチーズと特製ミートソースを贅沢に。アボカドの彩りが、落ち着いた店内に華やかさを添える、シェアに最適なプレートです。',
            'image_path' => 'images/menus/chip.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'サーモンアボカドボウル',
            'price' => 1600,
            'description' => '脂ののった新鮮なサーモンとクリーミーなアボカドを贅沢に使用。ラディッシュの赤とライムの緑が、シックなテーブルを華やかに彩る、宝石箱のようなパワーサラダです。',
            'image_path' => 'images/menus/ThermonsSalad.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => '旬菜のグリルエチュベ',
            'price' => 1400,
            'description' => 'ブロッコリーやパプリカなど、彩り豊かな野菜の旨味を凝縮しました。ローストガーリックの芳醇な香りとレモンの酸味が、お肉料理の最高のパートナーになります。',
            'image_path' => 'images/menus/salad.jpg',
            'is_active' => true,
        ],



        [
            'category_id' => $drink->id,
            'name' => 'エレメント・ソーダ',
            'price' => 550,
            'description' => '弾ける炭酸に魔法の果実を閉じ込めた、透き通るポーション。メロン、オレンジ、グレープ、ベリーの4種から、今のあなたに必要な色（エレメント）をお選びください。',
            'image_path' =>'images/menus/drink.jpg',
            'is_active' => true,

        ],
        [
            'category_id' => $drink->id,
            'name' => 'トワイライト・ティー',
            'price' => 650,
            'description' => '琥珀色に輝く、最高級の茶葉を使用した香り高い一杯。夕暮れ時（トワイライト）のような落ち着いたひとときを。',
            'image_path' => 'images/menus/LemonTea.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'クラウド・シェイク',
            'price' => 820,
            'description' => 'ふわふわの雲（ホイップ）を冠した、濃厚でクリーミーなデザートドリンク。ストロベリー、バニラ、マンゴーの3種の雲から、甘い魔法のひとときを。',
            'image_path' =>'images/menus/Shake.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '黒魔術のフォンダン',
            'price' => 980,
            'description' => 'ナイフを入れた瞬間、中から熱々の濃厚チョコが溢れ出します。甘い誘惑に抗えない、禁断のデザートです。',
            'image_path' => 'images/menus/FondanChocolate.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ステッキ・ベリー',
            'price' => 620,
            'description' => '幸運を運ぶピンクのステッキを添えた、甘酸っぱいベリーのケーキ。一口食べれば、日常がキラキラと輝き出す魔法を。',
            'image_path' => 'images/menus/CupcakePink.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ウィザード・ココア',
            'price' => 650,
            'description' => '幸運を運ぶピンクのステッキを添えた、甘酸っぱいベリーのケーキ。一口食べれば、日常がキラキラと輝き出す魔法を。',
            'image_path' => 'images/menus/CupcakeChocolate.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'スターライト・バニラ',
            'price' => 580,
            'description' => '黄金の星が降り注ぐ、太陽のようなカップケーキ。爽やかなバニラとバターの香りが、明るい朝のような元気を与えてくれます。',
            'image_path' => 'images/menus/CupcakeStar.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ギャラクシー・ケーキ',
            'price' => 680,
            'description' => '深い藍色の夜空に銀河の星々を散りばめた、神秘的な一皿。食べるのがもったいないほど美しい、宇宙の秘密を閉じ込めたケーキです。',
            'image_path' => 'images/menus/CupcakeStar2.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ベリー・ドーナツ',
            'price' => 850,
            'description' => '魔法が弾けた瞬間の、甘酸っぱい苺の衝撃。濃厚なストロベリーミルクの海に浸かった、王妃に捧げる極上のドーナツです。',
            'image_path' => 'images/menus/berry.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '黄金のキャラメルリング',
            'price' => 1980,
            'description' => '魔法で空中に浮き上がったかのような、軽やかな食感。2Pの溢れ出す黄金のキャラメルシロップと、2Pの大粒のベリーが口の中で踊り出します。',
            'image_path' => 'images/menus/Donatu.jpg',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '6層の塔',
            'price' => 1600,
            'description' => '焼きたての香りが立ち上る、圧巻の6段積み。とろけるバターと琥珀色のシロップは、まるで黄金の滝のようにあなたの食欲を誘います。',
            'image_path' => 'images/menus/ponkeck.jpg',
            'is_active' => true,
        ],



    ];

        foreach($menus as $menu) {
            Menu::create($menu);
        }
    }
}
