@extends('clerk.master')
@section('content')
    <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word"
        xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns="http://www.w3.org/TR/REC-html40">

    <head>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <meta name=ProgId content=Word.Document>
        <meta name=Generator content="Microsoft Word 14">
        <meta name=Originator content="Microsoft Word 14">
        <link rel=File-List href="accomplishments.files/filelist.xml">
        <title></title>
        <!--[if gte mso 9]><xml><o:DocumentProperties><o:Author>Renz Clayford Andoy</o:Author><o:LastAuthor>User</o:LastAuthor><o:Revision>1</o:Revision><o:Pages>1</o:Pages><o:Characters>695</o:Characters><o:Lines>5</o:Lines><o:Paragraphs>1</o:Paragraphs></o:DocumentProperties><o:CustomDocumentProperties><o:KSOProductBuildVer dt:dt="string" >1033-12.2.0.17562</o:KSOProductBuildVer><o:ICV dt:dt="string" >DA2AEB802FB5435FAF9878B616194A51_13</o:ICV></o:CustomDocumentProperties></xml><![endif]--><!--[if gte mso 9]><xml><o:OfficeDocumentSettings></o:OfficeDocumentSettings></xml><![endif]--><!--[if gte mso 9]><xml><w:WordDocument><w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel><w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery><w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery><w:DocumentKind>DocumentNotSpecified</w:DocumentKind><w:DrawingGridVerticalSpacing>7.8 磅</w:DrawingGridVerticalSpacing><w:PunctuationKerning></w:PunctuationKerning><w:View>Web</w:View><w:Compatibility><w:DontGrowAutofit/></w:Compatibility><w:Zoom>0</w:Zoom></w:WordDocument></xml><![endif]--><!--[if gte mso 9]><xml><w:LatentStyles DefLockedState="false"  DefUnhideWhenUsed="true"  DefSemiHidden="true"  DefQFormat="false"  DefPriority="99"  LatentStyleCount="260" >
        <w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Normal" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="heading 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 7" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 8" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="9"  SemiHidden="false"  QFormat="true"  Name="heading 9" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 7" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 8" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index 9" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 7" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 8" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  Name="toc 9" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Normal Indent" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="footnote text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="header" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="footer" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="index heading" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="35"  SemiHidden="false"  QFormat="true"  Name="caption" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="table of figures" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="envelope address" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="envelope return" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="footnote reference" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation reference" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="line number" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="page number" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="endnote reference" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="endnote text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="table of authorities" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="macro" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="toa heading" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Bullet 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Number 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="10"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Title" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Closing" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Signature" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="1"  SemiHidden="false"  QFormat="true"  Name="Default Paragraph Font" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Continue 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Message Header" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="11"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Subtitle" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Salutation" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Date" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text First Indent" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text First Indent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Note Heading" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Body Text Indent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Block Text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Hyperlink" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="FollowedHyperlink" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="22"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Strong" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="20"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Emphasis" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Document Map" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Plain Text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="E-mail Signature" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Normal (Web)" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Acronym" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Address" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Cite" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Code" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Definition" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Keyboard" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Preformatted" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Sample" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Typewriter" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="HTML Variable" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Normal Table" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="annotation subject" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="No List" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="1 / a / i" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="1 / 1.1 / 1.1.1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Article / Section" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Simple 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Classic 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Colorful 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Columns 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 7" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Grid 8" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 7" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table List 8" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table 3D effects 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Contemporary" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Elegant" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Professional" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Subtle 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Subtle 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Web 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Balloon Text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="39"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Table Grid" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Table Theme" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Placeholder Text" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="No Spacing" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Paragraph" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Quote" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Intense Quote" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 1" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 2" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 3" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 4" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 5" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="60"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Shading Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="61"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light List Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="62"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Light Grid Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="63"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 1 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="64"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Shading 2 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="65"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 1 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="66"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium List 2 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="67"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 1 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="68"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 2 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="69"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Medium Grid 3 Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="70"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Dark List Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="71"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Shading Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="72"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful List Accent 6" ></w:LsdException>
        <w:LsdException Locked="false"  Priority="73"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Colorful Grid Accent 6" ></w:LsdException>
        </w:LatentStyles></xml><![endif]-->
        <style>
            @font-face {
                font-family: "Times New Roman";
            }

            @font-face {
                font-family: "宋体";
            }

            @font-face {
                font-family: "Calibri";
            }

            @font-face {
                font-family: "Calibri";
            }

            @font-face {
                font-family: "Wingdings";
            }

            p.MsoNormal {
                mso-style-name: Normal;
                mso-style-parent: "";
                margin-bottom: 8.0000pt;
                line-height: 107%;
                font-family: Calibri;
                mso-bidi-font-family: 'Times New Roman';
                font-size: 11.0000pt;
                mso-font-kerning: 1.0000pt;
            }

            span.10 {
                font-family: Calibri;
            }

            span.msoIns {
                mso-style-type: export-only;
                mso-style-name: "";
                text-decoration: underline;
                text-underline: single;
                color: blue;
            }

            span.msoDel {
                mso-style-type: export-only;
                mso-style-name: "";
                text-decoration: line-through;
                color: red;
            }

            table.MsoNormalTable {
                mso-style-name: "Table Normal";
                mso-style-parent: "";
                mso-style-noshow: yes;
                mso-tstyle-rowband-size: 0;
                mso-tstyle-colband-size: 0;
                mso-padding-alt: 0.0000pt 5.4000pt 0.0000pt 5.4000pt;
                mso-para-margin: 0pt;
                mso-para-margin-bottom: .0001pt;
                mso-pagination: widow-orphan;
                font-family: 'Times New Roman';
                font-size: 10.0000pt;
                mso-ansi-language: #0400;
                mso-fareast-language: #0400;
                mso-bidi-language: #0400;
            }

            table.MsoTableGrid {
                mso-style-name: "Table Grid";
                mso-tstyle-rowband-size: 0;
                mso-tstyle-colband-size: 0;
                mso-padding-alt: 0.0000pt 5.4000pt 0.0000pt 5.4000pt;
                mso-border-top-alt: 0.5000pt solid windowtext;
                mso-border-left-alt: 0.5000pt solid windowtext;
                mso-border-bottom-alt: 0.5000pt solid windowtext;
                mso-border-right-alt: 0.5000pt solid windowtext;
                mso-border-insideh: 0.5000pt solid windowtext;
                mso-border-insidev: 0.5000pt solid windowtext;
                mso-para-margin: 0pt;
                mso-para-margin-bottom: .0001pt;
                mso-pagination: widow-orphan;
                font-family: 'Times New Roman';
                font-size: 10.0000pt;
                mso-ansi-language: #0400;
                mso-fareast-language: #0400;
                mso-bidi-language: #0400;
            }

            @page {
                mso-page-border-surround-header: no;
                mso-page-border-surround-footer: no;
            }

            @page Section0 {
                margin-top: 72.0000pt;
                margin-bottom: 72.0000pt;
                margin-left: 72.0000pt;
                margin-right: 72.0000pt;
                size: 595.3000pt 841.9000pt;
                layout-grid: 18.0000pt;
                mso-header-margin: 35.4000pt;
                mso-footer-margin: 35.4000pt;
            }

            div.Section0 {
                page: Section0;
            }
        </style>
    </head>

    <body style="tab-interval:36pt;"><!--StartFragment-->
        <div class="Section0" style="layout-grid:18.0000pt;">
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><img width="97"
                    height="89" src="accomplishments.files/accomplishments0.png" align="left"
                    hspace="12"><img width="83" height="83"
                    src="accomplishments.files/accomplishments1.png" align="left" hspace="12"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Republic
                    of the Philippines</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">PALOMPON
                        INSTITUTE OF TECHNOLOGY</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Palompon,
                    Leyte</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal align=center
                style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;
    line-height:150%;"><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;line-height:150%;
    font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;">COLLEGE
                        OF TECHNOLOGY AND ENGINEERING</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;line-height:150%;
    font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal align=center
                style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;
    line-height:150%;"><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;line-height:150%;
    font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;">EXTENSION
                        AND COMMUNITY DEVELOPMENT UNIT</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;line-height:150%;
    font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;">
                <b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">ACCOMPLISHMENT
                        REPORT</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Month
                    – Month Year</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-indent:36.0000pt;text-align:center;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <table class=MsoTableGrid border=1 cellspacing=0
                style="border-collapse:collapse;width:499.5000pt;margin-left:-13.7500pt;
    border:none;mso-border-left-alt:0.5000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;
    mso-border-right-alt:0.5000pt solid windowtext;mso-border-bottom-alt:0.5000pt solid windowtext;mso-border-insideh:0.5000pt solid windowtext;
    mso-border-insidev:0.5000pt solid windowtext;mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;">
                <tr>
                    <td width=246 valign=top
                        style="width:184.5000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=72 valign=top
                        style="width:54.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Target</span></b><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                                    <o:p></o:p>
                                </span></b></p>
                    </td>
                    <td width=150 valign=top
                        style="width:112.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Accomplishment</span></b><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                                    <o:p></o:p>
                                </span></b></p>
                    </td>
                    <td width=196 valign=top
                        style="width:147.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:1.0000pt solid windowtext;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Remark</span></b><b><span
                                    style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                                    <o:p></o:p>
                                </span></b></p>
                    </td>
                </tr>
                <tr>
                    <td width=246 valign=top
                        style="width:184.5000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">Number of
                                active partnerships with LGUs, Industries, NGO, NGAs, SMEs, and other stakeholders as result
                                of extension activities</span><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p></o:p>
                            </span></p>
                    </td>
                    <td width=72 valign=top
                        style="width:54.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=150 valign=top
                        style="width:112.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=196 valign=top
                        style="width:147.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td width=246 valign=top
                        style="width:184.5000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">Number of
                                trainees weighted by the length of training.</span><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p></o:p>
                            </span></p>
                    </td>
                    <td width=72 valign=top
                        style="width:54.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=150 valign=top
                        style="width:112.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=196 valign=top
                        style="width:147.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td width=246 valign=top
                        style="width:184.5000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">Number of
                                extension programs/activities organized and supported consistent with the SUCs mandated and
                                priority programs.</span><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p></o:p>
                            </span></p>
                    </td>
                    <td width=72 valign=top
                        style="width:54.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=150 valign=top
                        style="width:112.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=196 valign=top
                        style="width:147.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td width=246 valign=top
                        style="width:184.5000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">Percentage of
                                beneficiaries who rate the training course/s and advisory services as satisfactory or higher
                                terms of quality and relevance</span><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p></o:p>
                            </span></p>
                    </td>
                    <td width=72 valign=top
                        style="width:54.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=150 valign=top
                        style="width:112.7000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                    <td width=196 valign=top
                        style="width:147.6500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;
    mso-border-left-alt:0.5000pt solid windowtext;border-right:1.0000pt solid windowtext;mso-border-right-alt:0.5000pt solid windowtext;
    border-top:none;mso-border-top-alt:0.5000pt solid windowtext;border-bottom:1.0000pt solid windowtext;
    mso-border-bottom-alt:0.5000pt solid windowtext;">
                        <p class=MsoNormal align=center style="margin-bottom:0.0000pt;text-align:center;"><span
                                style="font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                                <o:p>&nbsp;</o:p>
                            </span></p>
                    </td>
                </tr>
            </table>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Prepared
                    by:</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">Name
                        of Person</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&nbsp;&nbsp;&nbsp;&nbsp;____
                    Extension Unit Head</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">Approved
                    by:</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p>&nbsp;</o:p>
                </span></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">Name
                        of Person</span></b><b><span
                        style="mso-spacerun:'yes';font-family:Calibri;font-weight:bold;
    font-size:12.0000pt;mso-font-kerning:1.0000pt;">
                        <o:p></o:p>
                    </span></b></p>
            <p class=MsoNormal style="margin-bottom:0.0000pt;"><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">&#9;</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">____,
                    Dean</span><span
                    style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;
    mso-font-kerning:1.0000pt;">
                    <o:p></o:p>
                </span></p>
        </div><!--EndFragment-->
    </body>

    </html>
@endsection
