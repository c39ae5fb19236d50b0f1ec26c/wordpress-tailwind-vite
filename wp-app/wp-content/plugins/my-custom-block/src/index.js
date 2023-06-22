const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InspectorControls, BlockControls, AlignmentToolbar } = wp.blockEditor;
const { Button, SelectControl, PanelBody, FontSizePicker, ColorPalette } = wp.components;

registerBlockType('my-custom-block/my-block', {
    title: 'My Custom Block',
    icon: 'smiley',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
        image: {
            type: 'string',
            default: 'http://localhost/wp-content/uploads/600.png'
        },
        layout: {
            type: 'string',
            default: 'image-left'
        },
        fontSize: {
            type: 'number',
            default: 16
        },
        fontFamily: {
            type: 'string',
            default: 'Arial'
        },
        color: {
            type: 'string',
            default: '#000000'
        },
        alignment: {
            type: 'string',
            default: 'none'
        },
        animation: {
            type: 'string',
            default: 'fadeIn'
        }
    },

    edit({ attributes, setAttributes }) {
        const { content, image, layout, fontSize, color, alignment, fontFamily, animation } = attributes;

        function onChangeContent(newContent) {
            setAttributes({ content: newContent });
        }

        function onSelectImage(newImage) {
            setAttributes({ image: newImage.sizes.full.url });
        }

        function onChangeLayout(newLayout) {
            setAttributes({ layout: newLayout });
        }

        function onChangeFontSize(newFontSize) {
            setAttributes({ fontSize: newFontSize });
        }

        function onChangeColor(newColor) {
            setAttributes({ color: newColor });
        }

        function onChangeAlignment(newAlignment) {
            setAttributes({ alignment: newAlignment });
        }

        function onChangeFontFamily(newFontFamily) {
            setAttributes({ fontFamily: newFontFamily });
        }

        function onChangeAnimation(newAnimation) {
            setAttributes({ animation: newAnimation });
        }

        return (
            <div className={`container animated ${animation}`} style={{ flexDirection: layout === 'image-right' ? 'row-reverse' : 'row' }}>
                <InspectorControls>
                    <PanelBody title="Layout Settings">
                        <SelectControl
                            label="Layout"
                            value={layout}
                            options={[
                                { label: 'Image on the left', value: 'image-left' },
                                { label: 'Image on the right', value: 'image-right' },
                            ]}
                            onChange={onChangeLayout}
                        />
                    </PanelBody>
                    <PanelBody title="Text Settings">
                        <FontSizePicker
                            value={fontSize}
                            onChange={onChangeFontSize}
                        />
                        <ColorPalette
                            value={color}
                            onChange={onChangeColor}
                        />
                    </PanelBody>
                    <PanelBody title="Font Settings">
                        <SelectControl
                            label="Font"
                            value={fontFamily}
                            options={[
                                { label: 'Arial', value: 'Arial' },
                                { label: 'Verdana', value: 'Verdana' },
                                { label: 'Helvetica', value: 'Helvetica' },
                                { label: 'Tahoma', value: 'Tahoma' },
                                { label: 'Trebuchet MS', value: 'Trebuchet MS' },
                                { label: 'Times New Roman', value: 'Times New Roman' },
                                { label: 'Georgia', value: 'Georgia' },
                                { label: 'Garamond', value: 'Garamond' },
                                { label: 'Courier New', value: 'Courier New' },
                                { label: 'Brush Script MT', value: 'Brush Script MT' },
                                { label: 'Lucida Sans', value: 'Lucida Sans' },
                                { label: 'Palatino', value: 'Palatino' },
                                { label: 'Bookman', value: 'Bookman' },
                                { label: 'New Century Schoolbook', value: 'New Century Schoolbook' },
                                { label: 'Seravek', value: 'Seravek' },
                                { label: 'Avant Garde', value: 'Avant Garde' },
                                { label: 'Geneva', value: 'Geneva' },
                                { label: 'Monaco', value: 'Monaco' },
                                { label: 'Lucida Grande', value: 'Lucida Grande' },
                                { label: 'Roboto', value: 'Roboto' },
                            ]}
                            onChange={onChangeFontFamily}
                        />
                    </PanelBody>
                    <PanelBody title="Animation Settings">
                        <SelectControl
                            label="Animation"
                            value={animation}
                            options={[
                                { label: 'Fade In', value: 'fadeIn' },
                                { label: 'Slide In', value: 'slideIn' },
                                { label: 'Rotate In', value: 'rotateIn' },
                                // Dodaj tutaj więcej animacji
                            ]}
                            onChange={onChangeAnimation}
                        />
                    </PanelBody>
                </InspectorControls>
                <BlockControls>
                    <AlignmentToolbar
                        value={alignment}
                        onChange={onChangeAlignment}
                    />
                </BlockControls>
                <img src={image} />
                <RichText
                    tagName="p"
                    onChange={onChangeContent}
                    value={content}
                    style={{ fontSize: `${fontSize}px`, color: color, textAlign: alignment, fontFamily: fontFamily === 'Roboto' ? 'Roboto, sans-serif' : fontFamily }}
                />
                <MediaUpload
                    onSelect={onSelectImage}
                    type="image"
                    value={image}
                    render={({ open }) => (
                        <Button onClick={open}>
                            Upload Image
                        </Button>
                    )}
                />
            </div>
        );
    },

    save({ attributes }) {
        const { content, image, layout, fontSize, color, alignment, fontFamily, animation } = attributes;
    
        return (
            <div className={`container animated ${animation}`} style={{ flexDirection: layout === 'image-right' ? 'row-reverse' : 'row' }}>
                <img src={image} />
                <p style={{ fontSize: `${fontSize}px`, color: color, textAlign: alignment, fontFamily: fontFamily === 'Roboto' ? 'Roboto, sans-serif' : fontFamily }}
                    dangerouslySetInnerHTML={{ __html: content }}>
                </p>
            </div>
        );
    },

});
