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
            'description' => '厳選された和牛ブレンドのパティを贅沢に2枚。肉本来の旨味を閉じ込めるよう強火で一気に焼き上げ、溢れ出す肉汁を濃厚なダブルチェダーチーズが包み込みます。特製のビターチョコレートを隠し味に加えたブラウンソースが、最後の一口まで贅沢が止まらない、当店の至宝です。',
            'image_path' =>'images/menus/Whamburger.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'スモーキー・クリムゾン',
            'price' => 1980,
            'description' => '強火で焼き上げた和牛パティに、燻製の香りを纏わせた厚切りベーコンを贅沢にトッピング。ベーコンの鮮やかな赤と、溢れ出す黄金色のチェダーチーズが織りなす、重厚な味わいの逸品です。',
            'image_path' => 'images/menus/baconBurger.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'ザ・ゴールデン・プライム',
            'price' => 1480,
            'description' => '熟成された赤身肉の旨味をダイレクトに感じるシングルパティ。新鮮なトマト、レッドオニオン、そしてシャキシャキのレタスが織りなす色彩は、まさに宝石箱のよう。素材一つ一つの個性が、濃厚なチェダーチーズと特製バンズによって見事に調和した、テイクアウトの概念を覆す至高の一皿です。',
            'image_path' => 'images/menus/hamburger.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'クラフト・タルタル・チキン',
            'price' => 1550,
            'description' => '厳選した鶏もも肉を独自のスパイスでマリネし、驚くほどジューシーに揚げ上げました。卵のコクを活かした自家製タルタルソースと、フレッシュな野菜、濃厚なチェダーチーズが重なり合う、食べ応え抜群の本格チキンバーガーです。',
            'image_path' => 'images/menus/ChickenBurger.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'ミッドナイト・コンボ',
            'price' => 2300,
            'description' => '当店自慢の肉厚なクラフトバーガーに、カリッと揚げたポテトフライと、喉越しの良いコーラを添えた王道のセットメニューです。メインの旨味を最大限に引き立てるサイドとの組み合わせは、ランチタイムやディナーの満足度を一層高めます。',
            'image_path' => 'images/menus/Set.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '黄金ダブル・グリル',
            'price' => 1200,
            'description' => 'パキッと弾けるジューシーな特製ソーセージを2本贅沢に。スパイスの効いたマスタードが食欲を刺激します。',
            'image_path' => 'images/menus/HotDog.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '黒毛和牛のグリル',
            'price' => 2800,
            'description' => '200gの和牛を絶妙な火入れで閉じ込めた赤身の旨味。添えられたハーブの香りが食欲をそそる、ディナーの主役にふさわしい王道のサーロインステーキです。',
            'image_path' => 'images/menus/steki.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'プレミアム・フィレ',
            'price' => 4200,
            'description' => '牛肉の中で最も柔らかいとされるフィレ肉を、300gの厚切りで贅沢に提供。表面を香ばしく焼き上げ、中は美しいローズ色に仕上げる絶妙な火入れにより、赤身肉の繊細な旨味と口どけをダイレクトに堪能できる至高のステーキです。',
            'image_path' => 'images/menus/FilletSteak.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'リブアイステーキ',
            'price' => 5400,
            'description' => '500gという圧倒的な存在感。鮮やかなハーブバターソースが、よく合い、肉の本質を味わいたい方のための至高の一皿。',
            'image_path' => 'images/menus/steki2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'バーボン・スペアリブ',
            'price' => 3200,
            'description' => '特製のダークソースを何度も塗り重ね、じっくりとスモーク。骨からホロリと外れる驚きの柔らかさは、まさに熟練の技が光る贅沢な味わいです。',
            'image_path' => 'images/menus/supea.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'ホール・グリル・チキン',
            'price' => 3800,
            'description' => '丸鶏を一羽丸ごと、ハーブと岩塩でじっくりと時間をかけてローストしました。皮目はパリッと香ばしく、中は驚くほどしっとりと仕上げています。鶏本来の旨味を余すことなく閉じ込めた、シェアにも最適なダイナミックなメインディッシュです。',
            'image_path' => 'images/menus/TandooriChicken.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'ノルディック・サーモン',
            'price' => 2450,
            'description' => '大ぶりのサーモンフィレを、皮目はパリッと、身はしっとりとジューシーに焼き上げました。じっくりグリルして甘みを引き出した旬の野菜を添えて。レモンの酸味がサーモンの豊かな風味を一層引き立てる、至高のメインディッシュです。',
            'image_path' => 'images/menus/GrilledSalmon.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'プロフェシー・ラップ',
            'price' => 1580,
            'description' => '熟成されたお肉と新鮮な野菜を、魔法の呪文で包み込むように丁寧に巻き上げました。溢れ出す秘伝のホワイトソースが、複雑で深い味わいの予言（プロフェシー）を授けます。',
            'image_path' => 'images/menus/tortilla.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'サンセット・フィースト',
            'price' => 1320,
            'description' => '黄金色に焼き上げたチキンに、ライムの魔法をひと振り。夕焼け（サンセット）のように鮮やかな野菜とパクチーが、口の中で爽やかな宴（フィースト）を繰り広げます。',
            'image_path' => 'images/menus/ChickenTacos.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'アズテック・ゴールド',
            'price' => 1750,
            'description' => '古代の秘宝を思わせる、スパイス香る牛挽肉のタコス。濃厚なワカモレとサルサの刺激が、眠っていた食欲を呼び覚ます、まさに「黄金」と呼ぶにふさわしい贅沢な3ピースです。',
            'image_path' => 'images/menus/tacos.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '王妃のマルゲリータ',
            'price' => 1850,
            'description' => 'イタリア王妃に捧げられた伝統のレシピ。フレッシュトマトのルビーのような輝きと、芳醇なモッツァレラ、そして摘みたてバジルの香りが、お口の中で鮮やかに踊ります。',
            'image_path' => 'images/menus/margherita.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '真夜中のサラミピザ',
            'price' => 2100,
            'description' => 'とろけ出す濃厚なチーズの海に、スパイシーなサラミの赤（クリムゾン）が映える、禁断の夜食。最後の一口までチーズが伸び続ける、至福のエンターテインメントです。',
            'image_path' => 'images/menus/SalamiPizza.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'アルケミスト・ガーデン',
            'price' => 2350,
            'description' => '色とりどりの野菜、熟成肉、オリーブを贅沢に散りばめた、まさに「錬金術師の庭」のような一皿。複雑に絡み合う素材の旨味が、一口ごとに異なる驚きを与えてくれます。',
            'image_path' => 'images/menus/MixPizza.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'チキンシーザーピザ',
            'price' => 2200,
            'description' => '香ばしく焼き上げたグリルチキンとトマトの上に、新鮮なロメインレタスと雪のようなパルメザンを山盛りに。サラダの爽やかさとピザの重厚感が共鳴する、新感覚の贅沢です。',
            'image_path' => 'images/menus/ChickenPizza.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'ホワイトタワー・B.L.T.',
            'price' => 1950,
            'description' => '丁寧に焼き上げたトーストに、旨味の強い厚切りベーコン、フレッシュなレモン色の卵、みずみずしいレタスとトマトを幾重にも重ねました。まろやかなマヨネーズが素材の一体感を高める、正統派のボリュームサンドイッチです。',
            'image_path' => 'images/menus/sandwich.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $main->id,
            'name' => 'カプレーゼ・バゲット',
            'price' => 1850,
            'description' => '香ばしく焼き上げたハードバゲットに、厚切りのフレッシュトマト、濃厚なモッツァレラチーズ、そして熟成ハムを幾重にも重ねました。バジルの爽やかな香りとオリーブオイルの風味が素材の味を引き立てる、食べ応え抜群のプレミアムサンドイッチです。',
            'image_path' => 'images/menus/bucket.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'エッグ＆アボカド・トースト',
            'price' => 1580,
            'description' => '香ばしく焼き上げたカンパーニュに、クリーミーなアボカドと絶妙な火入れの目玉焼きをのせて。仕上げに散らしたスパイスが、食欲をそそります。贅を尽くしたオープンサンドです。',
            'image_path' => 'images/menus/AvocadoBread.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'エッグ・パンドミ',
            'price' => 1400,
            'description' => '丁寧に焼き色をつけた食パンに、とろける半熟卵と厚切りハムをサンド。溢れ出す黄金の黄身が、至高。ポテトを添え朝の贅沢を凝縮した一皿です。',
            'image_path' => 'images/menus/Sando.webp',
            'is_active' => true,
        ],

        [
            'category_id' => $main->id,
            'name' => 'アズール・ボウル',
            'price' => 1850,
            'description' => '脂の乗った極上のマグロと、クリーミーなアボカドを贅沢に使用。彩り豊かな旬の野菜が、テーブルを華やかに彩ります。特製の醤油ベースのソースが全体を引き締める、贅を尽くしたパワーボウルです。',
            'image_path' => 'images/menus/bowl.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '燻製ベーコンのカルボナーラ',
            'price' => 1750,
            'description' => '濃厚な卵黄とパルメザンチーズが織りなす黄金色のソースに、香ばしく焼き上げた厚切りベーコンの塩味を効かせました。シンプルながらも奥行きのある深い味わいをご堪能ください。',
            'image_path' => 'images/menus/carbonara.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '熟成ミート・ラザニア',
            'price' => 2100,
            'description' => 'じっくりと煮込んだボロネーゼと、とろけるようなホワイトソースを幾重にも重ねました。焼き色のついたチーズの香ばしさと、溢れ出す肉の旨味が重厚なひとときを演出する、当店の自信作です。',
            'image_path' => 'images/menus/lasagna.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => '鮮魚とトマトのペスカトーレ',
            'price' => 1920,
            'description' => '旨味が凝縮された貝類と、フレッシュなトマトの酸味が調和する一皿。シックなテーブルに映えるトマトの紅と、魚介の芳醇な香りが食欲を刺激する、本格パスタです。',
            'image_path' => 'images/menus/TomatoPasta.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'クラフト・ジェノベーゼ',
            'price' => 1780,
            'description' => '摘みたてのバジルの鮮烈な香りと、香ばしく煎った松の実のコクが際立つ一皿。漆黒の器に映える鮮やかなグリーンと、削りたてのパルメザンチーズのコントラストが、テーブルにモダンな気品を添えます。',
            'image_path' => 'images/menus/genovese.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $main->id,
            'name' => 'プレミアム・ラビオリ',
            'price' => 1850,
            'description' => 'モッツァレラチーズを閉じ込めたラビオリを、最高級のオリーブオイルとフレッシュなハーブでシンプルに。素材の輪郭が際立つ洗練された味わいは、シャンパンや白ワインとの相性も抜群な、贅を尽くした一皿です。',
            'image_path' => 'images/menus/ravioli.webp',
            'is_active' => true,

        ],





        // サイドメニュー
        [
            'category_id' => $side->id,
            'name' => 'リネン・フライ',
            'price' => 680,
            'description' => '丁寧に手焼きしたような、温かみのあるフレンチフライ。リネンの布に包まれた、まるで休日のピクニックのような贅沢なひとときを。ハーブソルトの香りが魔法のように広がります。',
            'image_path' => 'images/menus/poteto.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'トレジャー・ポテト',
            'price' => 750,
            'description' => '溢れんばかりのポテトを特製ボックスに詰め込んだ、まさに「食の宝箱」。みんなでシェアするのも良し、独り占めするのも良し。最後までカリカリ感が続く魔法のカットです。',
            'image_path' => 'images/menus/poteto2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'クラフト・ナゲット',
            'price' => 550,
            'description' => '外はカリッと、中はジューシーに仕上げた特製チキンナゲットです。独自のスパイスを配合した衣が鶏肉の甘みを引き立てます。ハンバーガーやパスタのお供に最適な、大人から子供まで楽しめるサイドディッシュの定番です。',
            'image_path' => 'images/menus/nugget.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'クラフト・オニオンリング',
            'price' => 720,
            'description' => '甘みの強い大玉の玉ねぎを使用し、独自の配合を施した衣でサクッと軽やかに揚げ上げました。黄金色のリングは、お酒のお供にも最適な、当店自慢のサイドメニューです。',
            'image_path' => 'images/menus/OnionRings.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'フィッシュ＆チップス',
            'price' => 1650,
            'description' => 'サクサクの衣で揚げた白身魚のフライに、たっぷりのポテトフライを添えた英国風の定番メニュー。濃厚なアボカドをベースにしたクリーミーなワカモレディップが、フライの香ばしさと絶妙にマッチする一皿です。',
            'image_path' => 'images/menus/FishAndChips.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'クラシック・プーティン',
            'price' => 1100,
            'description' => 'カナダの伝統的なソウルフードを再現。揚げたてのポテトに、濃厚な牛骨ベースのグレービーソースと、とろける粒状のチーズをたっぷりとトッピングしました。ソースのコクとチーズの食感がクセになる、満足感のある一皿です。',
            'image_path' => 'images/menus/pootie.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'クリスピーチキン',
            'price' => 1200,
            'description' => '厳選されたハーブとスパイスを配合した独自の衣で、驚くほど軽やかな食感に仕上げました。噛むたびに溢れる肉汁と香りが、最高の一品です。',
            'image_path' => 'images/menus/Chikin2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'スパイス・フィッシュフライ',
            'price' => 980,
            'description' => '身の引き締まった白身魚を、数種類のハーブとスパイスを配合した特製の衣でサクッと揚げ上げました。噛むたびに広がるスパイスの豊かな香りが、魚の甘みを引き立てます。お酒の席にも最適な、風味豊かなサイドメニューです。',
            'image_path' => 'images/menus/FishFry.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'スモーキー・マックチーズ',
            'price' => 1420,
            'description' => '濃厚なチェダーチーズソースをたっぷりと絡めたマカロニに、カリカリに焼き上げた燻製ベーコンをトッピング。重厚な空間にふさわしい、奥深いコクと背徳的な旨味が押し寄せる、大人のためのサイドディッシュです。',
            'image_path' => 'images/menus/MacaroniCheese.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'プロシュート・プラッター',
            'price' => 1850,
            'description' => '熟成された生ハムを極薄にスライスし、贅沢に盛り合わせました。口の中でとろけるような脂の甘みと、凝縮された肉の旨味をお楽しみいただけます。ワインやカクテルのお供に、そのままでも、パンに合わせても愉しめる逸品です。',
            'image_path' => 'images/menus/prosciutto.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'プライム・マッシュポテト',
            'price' => 850,
            'description' => 'シルクのような滑らかな口溶けと、芳醇なバターの香りが広がる究極のマッシュポテト。メインディッシュの美しさを引き立てる、洗練されたサイドメニューです。',
            'image_path' => 'images/menus/MashedPotato.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => '熟成ビーフシチュー',
            'price' => 1450,
            'description' => '厳選した牛塊肉を赤ワインと香味野菜でホロホロになるまでじっくりと煮込みました。肉の旨味が溶け出した濃厚なデミグラスソースに、生クリームのコクが加わった贅沢な味わいです。メイン料理に添える至福のサイドメニューとしてお楽しみください。',
            'image_path' => 'images/menus/BeefStew.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'クラフト・キッシュ',
            'price' => 1200,
            'description' => 'サクサクのパイ生地の中に、旬の野菜と濃厚なアパレイユを閉じ込め、じっくりと焼き上げました。素材の旨みが凝縮された、シックな空間でのティータイムにも最適な、上品な味わいの一皿。',
            'image_path' => 'images/menus/quiche.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'ゴールド・チーズディップ',
            'price' => 780,
            'description' => 'まるで魔法で溶かした「金（ゴールド）」のような、超濃厚チェダーチーズソース。香ばしいトルティーヤチップスを添えて。一口食べれば、そのコク深い味わいに誰もが魅了される禁断のサイドメニューです。',
            'image_path' => 'images/menus/CheeseSauce.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $side->id,
            'name' => 'デラックス・ナチョス',
            'price' => 1100,
            'description' => 'パリッと揚げたトルティーヤチップスに、完熟アボカドを使用した濃厚なワカモレと、コク深いとろけるチーズを贅沢に添えました。チップスの香ばしさとディップのクリーミーさが後を引く、シェアにも最適なサイドメニューです。',
            'image_path' => 'images/menus/chip.webp',
            'is_active' => true,
        ],

        [
            'category_id' => $side->id,
            'name' => 'ローストチキン・ガーデンサラダ',
            'price' => 1520,
            'description' => 'しっとりと焼き上げたローストチキンをメインに、数肉厚のアボカド、フレッシュな赤玉ねぎやトマトを贅沢に盛り合わせたパワーサラダです。素材の味を活かしたシンプルな味付けで、メインディッシュとしても十分な満足感を提供します。',
            'image_path' => 'images/menus/ChickenSalad.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'サーモンアボカドボウル',
            'price' => 1600,
            'description' => '脂の乗った新鮮なサーモンのスライスを主役に、彩り豊かな季節の野菜をふんだんに使用しました。サーモンのとろける食感と、野菜のシャキシャキとしたコントラストが愉しめる、栄養バランスに優れたヘルシーな一皿です。',
            'image_path' => 'images/menus/ThermonsSalad.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => '旬菜のグリルエチュベ',
            'price' => 1400,
            'description' => 'ブロッコリーやパプリカなど、彩り豊かな野菜の旨味を凝縮しました。ローストガーリックの芳醇な香りとレモンの酸味が、お肉料理の最高のパートナーになります。',
            'image_path' => 'images/menus/salad.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'ベジタブル・グリル串',
            'price' => 780,
            'description' => '旬の野菜を大きめにカットし、直火で香ばしく焼き上げました。じっくり火を通すことで野菜本来の甘みを最大限に引き出し、岩塩とハーブでシンプルに仕上げています。素材の食感と鮮やかな味わいをお楽しみください。',
            'image_path' => 'images/menus/vegetables.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => '熟成プチ・ブール',
            'price' => 280,
            'description' => '小麦本来の香りと甘みが凝縮された、手のひらサイズの自家製パンです。外側はパリッと、中は驚くほどもっちりとした食感に仕上げました。シチューやステーキのソースを最後まで愉しむための、完璧な名脇役です。',
            'image_path' => 'images/menus/bread2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $side->id,
            'name' => 'クラフト・カンパーニュ',
            'price' => 450,
            'description' => '低温でじっくりと発酵させ、力強い粉の風味を引き出した大きなサイズの田舎風パンを、食べやすく厚切りにして提供します。噛み締めるほどに広がる酸味と旨味が、お肉料理やワインの味わいをより深く豊かに演出します。',
            'image_path' => 'images/menus/bread3.webp',
            'is_active' => true,
        ],




        // ドリンク・デザート
        [
            'category_id' => $drink->id,
            'name' => 'エレメント・ソーダ',
            'price' => 550,
            'description' => '弾ける炭酸に魔法の果実を閉じ込めた、透き通るポーション。メロン、オレンジ、グレープ、ベリーの4種から、今のあなたに必要な色（エレメント）をお選びください。',
            'image_path' => 'images/menus/drink.webp',
            'is_active' => true,

        ],
        [
            'category_id' => $drink->id,
            'name' => 'トワイライト・ティー',
            'price' => 650,
            'description' => '琥珀色に輝く、最高級の茶葉を使用した香り高い一杯。夕暮れ時（トワイライト）のような落ち着いたひとときを。',
            'image_path' => 'images/menus/LemonTea.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'クラウド・シェイク',
            'price' => 820,
            'description' => 'ふわふわの雲（ホイップ）を冠した、濃厚でクリーミーなデザートドリンク。ストロベリー、バニラ、マンゴーの3種の雲から、甘い魔法のひとときを。',
            'image_path' => 'images/menus/Shake.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '完熟バナナ・オレ',
            'price' => 720,
            'description' => '完熟したバナナを贅沢に使用し、濃厚なミルクと合わせたフレッシュな一杯。バナナ本来の自然な甘みと、クリーミーな喉越しが特徴です。お食事の後のデザートドリンクとしても、リラックスタイムの栄養補給としても最適です。',
            'image_path' => 'images/menus/BananaMilk.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'クラフト・アップルパイ',
            'price' => 1150,
            'description' => 'じっくりとシナモンで煮込んだ林檎を、バター香る何層ものパイ生地で包み込みました。黄金色の焼き目と、温かな果実の甘みが織りなす、伝統的かつ贅沢な一皿です。',
            'image_path' => 'images/menus/ApplePie.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '黒魔術のフォンダン',
            'price' => 980,
            'description' => 'ナイフを入れた瞬間、中から熱々の濃厚チョコが溢れ出します。甘い誘惑に抗えない、禁断のデザートです。',
            'image_path' => 'images/menus/FondanChocolate.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'プレミアム・ティラミス',
            'price' => 1200,
            'description' => 'マスカルポーネの濃厚なコクと、深く焙煎したエスプレッソの苦味が調和する、洗練されたデザート。仕上げのココアパウダーが重厚な空間に溶け込み、一口ごとに至福のひとときを演出します。',
            'image_path' => 'images/menus/Tiramisu.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ショコラ・ベリー・テラス',
            'price' => 980,
            'description' => '3つの濃厚なダークチョコレートブラウニーと、口溶けの良いミルクムースを層に重ねました。空中に舞うような軽やかな食感と、フレッシュなベリーの酸味が絶妙に調和する、視覚的にも華やかな一皿です。',
            'image_path' => 'images/menus/berryCake.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ルージュ・ベルベット',
            'price' => 1250,
            'description' => '深紅のスポンジと純白のクリームのコントラストが美しい、気品あふれるケーキです。贅沢に敷き詰められた苺の断面が、テーブルを彩ります。素材の甘みを引き立てる、上品で繊細な味わいをお楽しみください。',
            'image_path' => 'images/menus/berryCake2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ステッキ・ベリー',
            'price' => 620,
            'description' => '幸運を運ぶピンクのステッキを添えた、甘酸っぱいベリーのケーキ。一口食べれば、日常がキラキラと輝き出す魔法を。',
            'image_path' => 'images/menus/CupcakePink.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ウィザード・ココア',
            'price' => 650,
            'description' => '濃厚なチョコケーキの上に、魔法でふくらませたような大粒のマシュマロ。とろける甘さが心を満たす、癒やしのポーションです。',
            'image_path' => 'images/menus/CupcakeChocolate.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'スターライト・バニラ',
            'price' => 580,
            'description' => '黄金の星が降り注ぐ、太陽のようなカップケーキ。爽やかなバニラとバターの香りが、明るい朝のような元気を与えてくれます。',
            'image_path' => 'images/menus/CupcakeStar.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ギャラクシー・ケーキ',
            'price' => 680,
            'description' => '深い藍色の夜空に銀河の星々を散りばめた、神秘的な一皿。食べるのがもったいないほど美しい、宇宙の秘密を閉じ込めたケーキです。',
            'image_path' => 'images/menus/CupcakeStar2.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ベリー・ドーナツ',
            'price' => 850,
            'description' => '魔法が弾けた瞬間の、甘酸っぱい苺の衝撃。濃厚なストロベリーミルクの海に浸かった、王妃に捧げる極上のドーナツです。',
            'image_path' => 'images/menus/berry.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '黄金のキャラメルリング',
            'price' => 1980,
            'description' => '魔法で空中に浮き上がったかのような、軽やかな食感。2Pの溢れ出す黄金のキャラメルシロップと、2Pの大粒のベリーが口の中で踊り出します。',
            'image_path' => 'images/menus/Donatu.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ショコラ・コレクション',
            'price' => 980,
            'description' => '小ぶりなサイズのドーナツに、ビター、ミルク、ホワイトなど数種類の厳選チョコをコーティングした贅沢な6個セット。トッピングごとに異なる食感とカカオの風味を愉しめる、チョコ好きのためのバラエティ豊かな一皿です。',
            'image_path' => 'images/menus/SetDonut.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'クラフト・ミニドーナツ',
            'price' => 850,
            'description' => '一口サイズより少し大きめで食べ応えのある、自家製ミニドーナツを5個セットで提供。表面はサクッと、中はふんわりとした食感に仕上げ、優しい甘さのシュガーを纏わせました。ティータイムのシェアにも最適な一品です。',
            'image_path' => 'images/menus/RoundDonut.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ハニーバナナ・ワッフル',
            'price' => 1480,
            'description' => '外はカリッと焼き上げ、中はもっちりとした厚手のワッフルを2段重ねに。フレッシュバナナを贅沢に添え、芳醇なシロップをたっぷりとかけました。生地の香ばしさとフルーツの甘みが絶妙に調和する、満足感のあるプレートです。',
            'image_path' => 'images/menus/BananaWaffles.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => '6層の塔',
            'price' => 1600,
            'description' => '焼きたての香りが立ち上る、圧巻の6段積み。とろけるバターと琥珀色のシロップは、まるで黄金の滝のようにあなたの食欲を誘います。',
            'image_path' => 'images/menus/ponkeck.webp',
            'is_active' => true,
        ],
        [
            'category_id' => $drink->id,
            'name' => 'ノワール・ショコラ・クッキー',
            'price' => 380,
            'description' => '厳選したビターチョコレートチップを贅沢に練り込み、外はサクッと、中はしっとりと焼き上げました。濃厚で大人な甘さのプレミアム・クッキーです。',
            'image_path' => 'images/menus/cookie.webp',
            'is_active' => true,
        ],

    ];

        foreach($menus as $menu) {
            Menu::create($menu);
        }
    }
}
